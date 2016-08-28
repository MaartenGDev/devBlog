<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['slug','type','title','content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}