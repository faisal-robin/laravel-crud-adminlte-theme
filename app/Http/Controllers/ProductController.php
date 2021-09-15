<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product_list'] = Product::all();
        return view('product.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'Name' => 'required',
            'BuyPrice' => 'required|numeric',
            'SellPrice' => 'required|numeric',
            'AvailableQuantity' => 'required',
        ]);
         
        $product = new product;

        $product->name = $request->Name;
        $product->buy_price = $request->BuyPrice;
        $product->sale_price = $request->SellPrice;
        $product->available_quantity = $request->AvailableQuantity;

        $product->save(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product_info'] = Product::find($id);
        return view('product.edit_product', $data);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required',
            'BuyPrice' => 'required',
            'SellPrice' => 'required',
            'AvailableQuantity' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->Name;
        $product->buy_price = $request->BuyPrice;
        $product->sale_price = $request->SellPrice;
        $product->available_quantity = $request->AvailableQuantity;
        $product->save();

        //return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('product');
    }
}
