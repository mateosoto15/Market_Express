<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Imports\ProductsImport;
use App\Imports\ProductsMarketsImport;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('authAdmin', ['except' => ['get_products_select']]);
    }

    /**
     * Show the view index products.
     *
     * @return view
     */
    public function index()
    {
        return view('products.index');
    }

    /**
     * Show the Create products view.
     *
     * @return view
     */
    public function create()
    {
        $this->authorize('create', Product::class);

        $product = new Product;
        return view('products.create', compact('product'));
    }

    /**
     * Show the edit products .
     *
     * @return view
     */
    public function edit($id)
    {
        $this->authorize('update', Product::class);

        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Store a new Product.
     *
     * 
     */
    public function store(Request $request)
    {
        $this->authorize('create', Product::class);

        if(isset($request->file)){
            $hasFile = $request->hasFile('file') && $request->file->isValid();
            $import = new ProductsImport();
            $import->import(request()->file('file'));
            $message = ' <br/>  ERRORES  <br/>';
            $message .= '<table style="border: 1px solid black;"> <thead> <tr> <th>Linea del archivo</th> <th>Campo que falló</th><th>Error</th> <tr> </thead>';
            foreach ($import->failures() as $failure) {
                $message .= '<tr> <td>' . $failure->row() . '</td><td> ' . $failure->values()[$failure->attribute()] . '</td><td> ' . $failure->errors()[0]. '</td></tr>';
            }
            \Storage::disk('local')->put('public/import_errors_' . \Auth::id() . '.html', $message);


            \Session::flash('message', 'Se estan importando <a  class="btn btn-outline-danger"  onclick="window.open('. "'" . asset('storage/import_errors_' . \Auth::id() . '.html') . "'" . ');"> Errores</a>');
            
            return redirect('/admin/products');
        }elseif(isset($request->file_market)){

            $hasFile = $request->hasFile('file_market') && $request->file_market->isValid();
            $import = new ProductsMarketsImport();
            $import->import(request()->file('file_market'));
            $message = ' <br/>  ERRORES  <br/>';
            $message .= '<table style="border: 1px solid black;"> <thead> <tr> <th>Linea del archivo</th> <th>Campo que falló</th><th>Error</th> <tr> </thead>';
            foreach ($import->failures() as $failure) {
                $message .= '<tr> <td>' . $failure->row() . '</td><td> ' . $failure->values()[$failure->attribute()] . '</td><td> ' . $failure->errors()[0]. '</td></tr>';
            }
            \Storage::disk('local')->put('public/import_errors_' . \Auth::id() . '.html', $message);


            \Session::flash('message', 'Se estan importando <a  class="btn btn-outline-danger"  onclick="window.open('. "'" . asset('storage/import_errors_' . \Auth::id() . '.html') . "'" . ');"> Errores</a>');
            
            return redirect('/admin/products');
        }else{
	        $this->validate($request,[
	            'name' => ['required', 'string', 'max:255'],
	            'description' => ['required'],
	            'market_id' => ['required'],
	        ]);
        }
        $product = new Product($request->all());
        if($product->save()){
            \Session::flash('message', 'Producto Creado');
            return redirect('/admin/products');
        }else
        {
            \Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/admin/products');
        }
    }

    /**
     * Store a new Product.
     *
     * 
     */
    public function update(Request $request, $id)
    {
        $this->authorize('create',  Product::class);

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'market_id' => ['required'],
        ]);

        $product = Product::find($id);


        if($product->update($request->all())){
            \Session::flash('message', 'Producto Actualizado');
            return redirect('/admin/products');
        }else
        {
            \Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/admin/products');
        }
    }

    /**
     * Delete a products.
     *
     * 
     */
    public function destroy($id)
    {
        $this->authorize('delete', Product::class);

        $product = Product::find($id);
        $product->markets()->detach();
        if($product->delete()){
            return response('OK', 200);
        }else
        {
            \Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/admin/products');
        }
    }


    /**
     * Get the products.
     *
     * @return all products
     */
    public function getProducts()
    {
        return \Datatables()->of(Product::query())->toJson();
    }

    /**
     * get all products for select2
     *
     * @return part of products
     */
    public function get_products_select(Request $request){
        $products = Product::where(function ($query) use ($request) {
            $query->where('name','like','%'.$request->term.'%')->orWhere('description','like', '%'.$request->term. '%');
        })->limit(10)->get();
        $results = [];
        foreach ($products as $product) {

            $r = new \stdClass;
            $r->id = $product->id;
            $r->text = $product->name .' - '. str_limit($product->description, 60);
            $results[] = $r;
            
        }
        return $results;
    }
}
