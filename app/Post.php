<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'description', 'content', 'category_id', 'thumbnail', 'user_id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id' );
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
         return $this->hasMany(Comment::class);
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('thumbnail')){
            if ($image){
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            $nameImage = date('Y-m-d H-i-s') .' '. $request->title .' '.  rand(0, 10000) .'.'. $request->file('thumbnail')->getClientOriginalExtension();
            return $request->file('thumbnail')->storeAs("images/{$folder}", $nameImage);
        }
        return null;
    }

    public function getImage()
    {
        if (!$this->thumbnail) {
            return asset('upload/no-Images.jpg');
        }
        return asset("upload/{$this->thumbnail}");
    }


    public function getPostDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('F d, Y');
    }

    public function getComments()
    {
        return $this->comments()->where('status', 1)->get();
    }
}
