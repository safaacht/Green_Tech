<?php

namespace App\Http\Controllers;

use App\Models\Category;

abstract class Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
}
