<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\product;
use App\Models\category;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function add(){
        $category = category::all();
        return view('admin.products.add', compact('category'));
    }
    public function insert(Request $request){
        $products = new Product();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $products->image = $filename;
        }
        $products->category_id = $request->input('category_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->orginal_price = $request->input('orginal_price');
        $products->selling_price = $request->input('selling_price');
        $products->tax = $request->input('tax');
        $products->quantity = $request->input('quantity');
        $products->status = $request->input('status') == TRUE ? '1' : '';
        $products->trending = $request->input('trending') == TRUE ? '1' : '';
        $products->meta_title = $request->input('meta_title');
        $products->meta_keyword = $request->input('meta_keyword');
        $products->meta_description = $request->input('meta_description');
        $products->save();
        return redirect('products')->with('status', 'Product Added SuccessFully!');
    }
    public function edit($id){
        $products = Product::find($id);
        return view("admin.products.edit", compact('products'));
    }
    public function update(Request $request, $id){
        $products = Product::find($id);
        if($request->hasFile('image')){
            $path = 'assets/uploads/product/'.$products->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $products->image = $filename;
        }
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->orginal_price = $request->input('orginal_price');
        $products->selling_price = $request->input('selling_price');
        $products->tax = $request->input('tax');
        $products->quantity = $request->input('quantity');
        $products->status = $request->input('status') == TRUE ? '1' : '';
        $products->trending = $request->input('trending') == TRUE ? '1' : '';
        $products->meta_title = $request->input('meta_title');
        $products->meta_keyword = $request->input('meta_keyword');
        $products->meta_description = $request->input('meta_description');
        $products->update();
        return redirect('products')->with('status', 'Products was Updated successfully!');
    }

    public function destroy($id){
        $products = Product::find($id);
        if($products->image){
            $path = 'assets/uploads/product/'.$products->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $products->delete();
        return redirect('products')->with('status', 'Products deleted Successfully');
    }
}
