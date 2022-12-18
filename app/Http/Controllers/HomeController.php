<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Comment;

class HomeController extends Controller
{
    private $categories, $brands, $products ;
    public function index()
    {
        $this->products = Product::all();
        $this->categories = Category::all();
        $this->brands = Brand::all();
        return view('home.index',['products'=>$this->products, 'categories'=>$this->categories, 'brands'=>$this->brands]);
    }

    public function newComment(Request $request, $id)
    {
        Comment::newComment($request, $id);
        return redirect()->back()->with('message', 'Comment submit successfully.');
    }
}
