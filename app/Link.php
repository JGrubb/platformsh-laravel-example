<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{

    protected $fillable = [
        'title',
        'url'
    ];

    public function link_tags() {
        return $this->belongsToMany(\App\LinkTag::class);
    }
}
