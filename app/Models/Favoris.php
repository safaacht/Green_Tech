<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Favoris extends Model
{
    

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function clients()
    {
        return $this->hasMany(User::class);
    }
}    