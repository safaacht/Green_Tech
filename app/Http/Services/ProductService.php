<?php

namespace App\Http\Services;

use App\Http\Requests\StoreProductRequest;
use App\Models\MyCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function getProductsBy($search, $category = null)
    {
        $query = Product::query();
        if($search){
            $query = $query->where("name", "LIKE", "%" . $search . "%");
        }
        if($category){
            $query = $query->where("category_id", $category);
        }
        return $query->get();
    }
}    