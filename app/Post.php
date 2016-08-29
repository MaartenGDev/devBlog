<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['slug','type','title','body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}