<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Image;

class AdminController extends Controller
{
    public function add(){
        return view('backend.add');
    }
    public function manage(){
        $products = Product::all();
        return view('backend.manage',compact('products'));
    }
    public function save(Request $request){
        if($request->image){
            $img = $request->file('image');
            $customName = rand().".".$img->getClientOriginalExtension();
            $path = public_path('uploads/'.$customName);
            Image::make($img)->resize(212,264)->save($path);
        }
        Product::insert([
            'name'=>$request->name,
            'category_name'=>$request->category_name,
            'brand_name'=>$request->brand_name,
            'description'=>$request->description,
            'image'=>$customName,
            
        ]);
        return back();
    }
    public function delete($id){
        $product = Product::find($id);
        if(file_exists('uploads/'.$product->image)){
            unlink('uploads/'.$product->image);
        }
        $product->delete();
        return back();
    }
    public function edit($id){
        $product = Product::find($id);
        return view('backend.edit',compact('product'));
    }
    public function update($id, Request $request){
        $product = Product::find($id);
        if(!empty($request->image)){
            unlink('uploads/'.$product->image);
            $img = $request->file('image');
            $customName = rand().".".$img->getClientOriginalExtension();
            $path = public_path('uploads/'.$customName);
            Image::make($img)->resize(212,264)->save($path);
            
                $product->name=$request->name;
                $product->category_name=$request->category_name;
                $product->brand_name=$request->brand_name;
                $product->description=$request->description;
                $product->image=$customName;
                $product->update();
        }
        else{
            
                $product->name=$request->name;
                $product->category_name=$request->category_name;
                $product->brand_name=$request->brand_name;
                $product->description=$request->description;
                $product->update();
        }

        return redirect('product/manage');

    }
}





// 'name'
// 'category_name'
// 'brand_name'
// 'description'
// 'image'
// 'status'
