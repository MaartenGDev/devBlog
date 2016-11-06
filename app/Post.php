<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $fillable = ['slug','type','title','body','thumbnail'];


    public function getSlug(){
        return str_slug($this->attributes['title']);
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopeOfType($query,$type)
    {
        return $query->where('type', $type);
    }

    public function scopeBlogPost($query){
        return $query->where('type', 0);
    }

    public static function allPosts()
    {
        return collect(
            DB::table('posts')
                ->leftJoin('users', 'users.id', '=', 'posts.user_id')
                ->select('users.name', 'posts.*')
                ->get()
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}