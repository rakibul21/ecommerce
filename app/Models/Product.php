<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product;
    private static $image, $imageName, $imageUrl, $directory;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'product-image/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newProduct($request)
    {
        self::$product =  new Product();
        self::$product->category_id     = $request->category_id;
        self::$product->brand_id        = $request->brand_id;
        self::$product->name            = $request->name;
        self::$product->code            = $request->code;
        self::$product->description     = $request->description;
        self::$product->status          = $request->status;
        self::$product->image           = self::getImageUrl($request);
        self::$product->save();
    }


    public static function updateProduct($request, $id)
    {
        self::$product =  Product::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$product->image;
        }
        self::$product->category_id     = $request->category_id;
        self::$product->brand_id        = $request->brand_id;
        self::$product->name            = $request->name;
        self::$product->code            = $request->code;
        self::$product->description     = $request->description;
        self::$product->status          = $request->status;
        self::$product->image           = self::$imageUrl;
        self::$product->save();
    }


    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
    }



    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
