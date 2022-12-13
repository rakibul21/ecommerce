<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class BrandController extends Controller
{
    private $categories, $brands , $brand, $products;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->brands = Brand::all();
        return view('brand.manage',['brands' => $this->brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->categories = Category::all();
        return view('brand.index',['categories' => $this->categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Brand::newBrand($request);
        return redirect('/brand/create')->with('message', 'Brand info save successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->brand = Brand::find($id);
        return view('brand.detail',['brand'=>$this->brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->brand = Brand::find($id);
        $this->categories = Category::all();
        return  view('brand.edit',['brand' => $this->brand,'categories'=>$this->categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Brand::updateBrand($request, $id);
        return redirect('/brand')->with('messageu'.'Brand info update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::deleteBrand($id);
        return redirect('/brand')->with('messaged','Brand info deleted successfully');
    }

    public function details($id)
    {
        $this->products = Product::where('brand_id',$id)->get();
        return view('brand.details',['products'=>$this->products]);
    }
}
