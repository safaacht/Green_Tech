<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product=new Product();
        $products=$product->all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $product=new Product();
            $product->name=$request['name'];
            $product->description=$request['description'];
            $product->price=$request['price'];
            $product->category_id=$request['category_id'];
            $product->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            $product=new Product();
            $product=$product->find($id);
            return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $product=new Product();
            $product=$product->find($id);
            return view('product.edit',compact('product')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $product=new Product();
            $product=$product->find($id);
            $product->name=$request['name'];
            $product->description=$request['description'];
            $product->price=$request['price'];
            $product->category_id=$request['category_id'];
            $product->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $product=new Product();
            $product=$product->find($id);
            $product->delete();
    }
}
