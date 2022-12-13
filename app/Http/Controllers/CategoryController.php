<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    private $categories, $category, $products;

    public function index()
    {
        return view('category.index');
    }

    public function create(Request $request)
    {
        Category::newCategory($request);
        return redirect('category/add')->with('message', 'Category info create successfully.');

    }

    public function manage()
    {
        $this->categories = Category::all();
        return view('category.manage',['categories' => $this->categories]);
    }

    public function edit($id)
    {
        $this->category = Category::find($id);
        return view('category.edit', ['category' => $this->category]);

    }

    public function update(Request $request ,$id)
    {
        Category::updateCategory($request, $id);
        return redirect('/category/manage')->with('message','Category info Update Successfully');

    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return redirect('/category/manage')->with('messaged','Category info Deleted');
    }

    public function details($id)
    {
        $this->products = Product::where('category_id',$id)->get();
        return view('category.details',['products'=>$this->products]);
    }
}
