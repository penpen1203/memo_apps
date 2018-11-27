<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'published_at'];

    //日付ミューテータを使う
    protected $dates = ['published_at'];
    //

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }
}
