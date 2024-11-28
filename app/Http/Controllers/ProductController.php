<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Configuration;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $categoryId= $request->category;
        if($categoryId==""){
            $product=Product::get();
        }else{
            $product=Product::where('category_id',$categoryId)->get();
        }
        $category= Category::get();
        $config = Configuration::first();
        return view('product', compact('category', 'product'));
    }
}
