<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products =Product::all();
        return view('products.index',compact('products'));
    }

    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        
        Product::create($request->all());
        
        return redirect('products')->with('success','product added successfully');
    }
    
    public function edit($id) {
        $product =Product::findorFail($id);
        return view('products.edit',compact('product'));
    }
    public function update(Request $request,$id){
       $product =Product::findOrFail($id);
       $product->update($request->all());
       return redirect('products')->with('success', 'product Updated Successfully');
        
      
    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('products')->with('success', 'product Deleted Successfully');
    }
}