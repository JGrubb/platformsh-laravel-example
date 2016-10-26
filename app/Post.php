<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Michelf\MarkdownExtra;
use Urodoz\Truncate\TruncateService;

class Post extends Model
{
    protected $appends = ['prev', 'next'];

    public function tags()
    {
        return $this->belongsToMany(\App\Tag::class);
    }

    public function getBodyAttribute($value)
    {
        $parser = new MarkdownExtra();
        $parser->code_class_prefix = "language-";
        return $parser->transform($value);
    }

    public function getSummaryAttribute($value)
    {
        if (strlen($value)) {
            return $value;
        } else {
            $truncate = new TruncateService();
            return $truncate->truncate($this->body, 500);
        }
    }

    public function getPrevAttribute() {
        if(isset($this->previous_id)) {
            $value = Cache::remember("previous:{$this->id}", 1, function() {
                return Post::find($this->previous_id);
            });
            return $value;
        }
    }

    public function getNextAttribute() {
        $value = Cache::remember("next:{$this->id}", 1, function() {
            if($post = Post::where('previous_id', '=', $this->id)->first()) {
                return $post;
            }
        });
        return $value;
    }

}
