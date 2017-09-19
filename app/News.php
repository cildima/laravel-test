<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 'publish_date', 'preview_text', 'detail_text', 'picture'
    ];
}
