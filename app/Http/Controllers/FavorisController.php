<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FavorisController extends Controller
{
    public function index(){
        $products = auth()->user()->products;
        return view('client.favoris', compact('products'));
    }

    public function toggle(Product $product){
        auth()->user()->products()->toggle($product->id);
        return back();
    }
}
