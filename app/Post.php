<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Indal\Markdown\Facade as Markdown;

class Post extends Model
{
    protected $fillable = ['slug','type','title','body','thumbnail'];


    public function getSlug(){
        return str_slug($this->attributes['title']);
    }

    public function getPreviewAttribute(){
        return strip_tags(Markdown::parse($this->attributes['body']),'<strong><i>');
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

    public static function findBySlug($slug){
        return Post::with('user')->where('slug', $slug)->firstOrFail();
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