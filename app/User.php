<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('avatar')){
            if ($image){
                Storage::delete($image);
            }
            $nameImage = $request->name .' '.  rand(0, 100000) .'.'. $request->file('avatar')->getClientOriginalExtension();
            return $request->file('avatar')->storeAs('avatar', $nameImage);
        }
        return null;
    }

    public function getImage()
    {
        if (!$this->avatar) {
            return asset('upload/no-Images.jpg');
        }
        return asset("upload/{$this->avatar}");
    }

    public static function getPassword($password, $user = null)
    {
        if ($password != null) {
            return bcrypt($password);
        }
        return $user->password;
        

    }
}
