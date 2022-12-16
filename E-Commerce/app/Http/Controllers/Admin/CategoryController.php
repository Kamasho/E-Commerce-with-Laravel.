<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function index(){
        $category = category::all();
        return view('admin.category.index', compact('category'));
    }

    public function add(){
        return view("admin.category.add");
    }

    public function insert(Request $request){
        $category = new category();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;
        }

        $category->name = $request->input("name");
        $category->slug = $request->input("slug");
        $category->description = $request->input("description");
        $category->status = $request->input("status") == TRUE ? '1':'0';
        $category->popural = $request->input("popural") == TRUE ? '1':'0';
        $category->meta_title = $request->input("meta_title");
        $category->meta_description = $request->input("meta_description");
        $category->meta_keywords = $request->input("meta_keywords");
        $category->save();
        return redirect('/dashboard')->with('status', 'Category Added Successfully');
    }

    public function edit($id){
        $category = category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $category = category::find($id);
        if($request->hasFile('image')){
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;
        }
        $category->name = $request->input("name");
        $category->slug = $request->input("slug");
        $category->description = $request->input("description");
        $category->status = $request->input("status") == TRUE ? '1':'0';
        $category->popural = $request->input("popural") == TRUE ? '1':'0';
        $category->meta_title = $request->input("meta_title");
        $category->meta_description = $request->input("meta_description");
        $category->meta_keywords = $request->input("meta_keywords");
        $category->update();
        return redirect("dashboard")->with('status', 'Category Update Successfully!');
    }
    public function destroy($id){
        $category = category::find($id);
        if($category->image){
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('category')->with('status', 'Category deleted Successfully');
    }

}
