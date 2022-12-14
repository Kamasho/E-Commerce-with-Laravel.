<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class FontEndController extends Controller
{
    public function index(){
        $feature_product = product::where('trending', '1')->take(15)->get();
        $category_product = category::where('popural', '1')->take(15)->get();
        return view("fontend.index", compact('feature_product', 'category_product'));
    }

    public function category(){
        $category = category::where('status','0')->get();
        return view("fontend.category", compact('category'));
    }

    public function viewCategory($slug){
        if(category::where('slug',$slug)->exists()){
            $category = category::where('slug', $slug)->first();
            $product = product::where('category_id', $category->id)->where('status','1')->get();
            return view('fontend.product.index', compact('category', 'product'));
        }else
        {
            return redirect('/')->with('status','Slug Does Not Exist');
        }
    }
    public function viewProduct($category_slug, $prod_slug){
        if(category::where('slug', $category_slug)->exists()){
            if(product::where('slug', $prod_slug)->exists()){
                $products = product::where('slug', $prod_slug)->first();
                return view('fontend.product.view', compact('products'));
            }else{
                return redirect('/')->with('status', "The link was broken");
            }
        }else{
            return redirect('/')->with('status', "No such category found!");
        }
    }
}
