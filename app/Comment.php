<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function toggleStatus()
    {
        if($this->status == 0){
            $this->status = 1;
            $this->save();
        }else{
            $this->status = 0;
            $this->save();
        }
    }
    public function newCommentsCount()
    {
        return $this->where('status', 0)->count();
    }
}
