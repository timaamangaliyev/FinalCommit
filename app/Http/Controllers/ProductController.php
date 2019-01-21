<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'verified'])->only([
            'store', 
            //'update',
            'destroy',
            ]);
    }

    public function index(Request $request)
    {
        $products = Product::all();
        return response()->json($products);
    }
     


    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['id'] = $request->user()->id;
        $product = Product::create($data);
        $product->categories()->attach($data['category_id_array']);
        var_dump ($product);
        return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // return $product->categories;
        return response()->json($product);
    }
    public function update(Request $request, Product $product)
    {
        dd('uraaa');
        $data = $request->all();
        $product->update($data);
        $product->categories()->sync($data['category_id_array'], false);
        return response()->json($product);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('update', $product);
        $product->delete();
        return response()->json([
                'message' => 'Successfully Deleted'
            ]);
    }
}
