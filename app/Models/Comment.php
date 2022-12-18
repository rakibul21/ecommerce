<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    private static $comments, $comment;

    public static function newComment($request, $id)
    {
        self::$comment = new Comment();
        self::$comment->product_id = $id;
        self::$comment->name = $request->name;
        self::$comment->comment = $request->comment;
        self::$comment->save();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);

    }

    public static function updateStatus($commentId)
    {
        self::$comment = Comment::find($commentId);
        if ( self::$comment->status == 1   )
        {
            self::$comment->status = 0;
        }
        else
        {
            self::$comment->status = 1;
        }
        self::$comment->save();
    }


}
