<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Market;

class MarketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('authAdmin', ['except' => 'getMarkets']); //just user admin
    }

    /**
     * Show the view index markets.
     *
     * @return view
     */
    public function index()
    {
        return view('markets.index');
    }

    /**
     * Show the Create markets view.
     *
     * @return view
     */
    public function create()
    {
        $this->authorize('create', Market::class);

        $market = new Market;
        return view('markets.create', compact('market'));
    }

    /**
     * Show the edit markets .
     *
     * @return view
     */
    public function edit($id)
    {

        $market = Market::find($id);
        $this->authorize('update', $market);
        return view('markets.edit', compact('market'));
    }

    /**
     * Store a new Market.
     *
     * 
     */
    public function store(Request $request)
    {
        $this->authorize('create', Market::class);
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'max:255'],
            'address' => ['required', 'max:255'],
        ]);
        $market = new Market($request->all());
        if($market->save()){
            \Session::flash('message', 'Mercado Creado');
            return redirect('/admin/markets');
        }else
        {
            \Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/admin/markets');
        }
    }

    /**
     * update a group.
     *
     * 
     */
    public function update(Request $request, $id)
    {
        $this->authorize('create',  Market::class);

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'max:255'],
            'address' => ['required', 'max:255'],
        ]);

        $market = Market::find($id);


        if($market->update($request->all())){
            \Session::flash('message', 'Mercado Actualizado');
            return redirect('/admin/markets');
        }else
        {
            \Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/admin/markets');
        }
    }

    /**
     * Delete a markets.
     *
     * 
     */
    public function destroy($id)
    {
        $this->authorize('delete', Market::class);

        $market = Market::find($id);
        $market->products()->detach();
        if($market->delete()){
            return response('OK', 200);
        }else
        {
            \Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/admin/markets');
        }
    }


    /**
     * get all markets for datatable
     *
     * @return Datables
     */
    public function getMarkets(){
        return \Datatables()->of(Market::query())->toJson();
    }

    /**
     * get all markets for select2
     *
     * @return part of markets
     */
    public function getmarkets_select(Request $request){
        $markets = Market::where(function ($query) use ($request) {
            $query->where('name','like','%'.$request->term.'%')->orWhere('description','like', '%'.$request->term. '%');
        })->limit(10)->get();
        $results = [];
        foreach ($markets as $market) {

            $r = new \stdClass;
            $r->id = $market->id;
            $r->text = $market->name .' - '. str_limit($market->description, 60);
            $results[] = $r;
            
        }
        return $results;
    }

    /**
     * get single markets for select2
     *
     * @return part of markets
     */
    public function single_market($id){
        $market = Market::find($id);
        $r = new \stdClass;
        $r->id = $market->id;
        $r->text = $market->name .' - '. str_limit($market->description, 60);
        return json_encode($r);
    }
}
