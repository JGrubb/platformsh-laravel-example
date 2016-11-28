<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkTag extends Model
{

    protected $fillable = [
        'name'
    ];

    public function links() {
        return $this->belongsToMany(\App\Link::class);
    }
}
