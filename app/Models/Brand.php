<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CategoryController;

class Brand extends Model
{
    use HasFactory;
    private static $brand, $image, $directory, $imageName, $imageUrl, $imageExtension ;

    public static function getImageUrl($request)
    {
        self::$image           = $request->file('image');
        self::$imageExtension       = self::$image->getClientOriginalExtension();
        self::$imageName         =time().'.'.self::$imageExtension;
        self::$directory       = 'brand-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newBrand($request)
    {
        self::$brand                     = new Brand();
        self::$brand->category_id        = $request->category_id;
        self::$brand->title              = $request->title;
        self::$brand->short_description  = $request->short_description;
        self::$brand->long_description   = $request->long_description;
        self::$brand->image              = self::getImageUrl($request);
        self::$brand->save();

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$brand->image;
        }
        self::$brand->category_id        = $request->category_id;
        self::$brand->title              = $request->title;
        self::$brand->short_description  = $request->short_description;
        self::$brand->long_description   = $request->long_description;
        self::$brand->image              = self::$imageUrl;
        self::$brand->save();

    }

    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        if (file_exists(self::$brand->image))
        {
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }
}
