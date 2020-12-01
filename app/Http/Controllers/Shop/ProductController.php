<?php

namespace App\Http\Controllers\Shop;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $similarProducts = Product::where('category_id', '=' ,$product->category->id)
        ->where('id', '!=' , $product->id)->orderBy('created_at', 'desc')->get();

        $data = [
            'product' => $product,
            'products' => $similarProducts,
        ];
        return view('shops.show')->with($data);
    }
}
