<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Listing Products',
            'products'     => Product::all(),
        ]); 
    }
}
