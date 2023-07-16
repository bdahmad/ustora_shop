<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('welcome',compact('products'));
    }
    public function details($id){
        $product = Product::find($id);
        return view('productDetails',compact('product'));
    }
}
