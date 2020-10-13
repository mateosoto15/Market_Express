<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    /**
     * Just Users Logged in
     *
     * @return void
     */
    public function __construct(){
        $this->middleware("auth");
    }

    /**
     * Show dashboard index
     *
     * @return view
     */
    public function index(){
        return view('publics.index');
    }

    public function search(Request $request){

    	$products = [];

        foreach ($request->products as $product_id) {
            $product = Product::find($product_id);
            foreach($product->markets as $market){
                $products[] = ['product' => $product, 'market' => $market, 'price' => $market->pivot->price];
            }
        }

    	return view('publics.product', compact('products'));
    }

}
