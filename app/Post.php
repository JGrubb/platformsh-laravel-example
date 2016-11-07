<?php

namespace App;

use App\Http\Requests\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Michelf\MarkdownExtra;
use Urodoz\Truncate\TruncateService;

class Post extends Model
{
    protected $appends = ['prev', 'next'];
    protected $fillable = [
        'title',
        'body',
        'summary',
        'pub_date',
        'slug'
    ];

    public function tags()
    {
        return $this->belongsToMany(\App\Tag::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $this->getMutatedTimestampValue($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return $this->getMutatedTimestampValue($value);
    }


    public function rendered_body() {
        $parser = new MarkdownExtra();
        $parser->code_class_prefix = "language-";
        return $parser->transform($this->body);
    }

    public function getSummaryAttribute($value)
    {
        if (strlen($value)) {
            return $value;
        } else {
            $truncate = new TruncateService();
            return $truncate->truncate($this->rendered_body(), 500);
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

    public function published_at() {
        $date = $this->getMutatedTimestampValue($this->pub_date);
        return $date->toDayDateTimeString();
    }

    public function getMutatedTimestampValue($value)
    {

        $timezone = config('app.timezone');

        return Carbon::parse($value)
            ->timezone($timezone);
    }

    public function setFields($params) {
        $this->title = $params['title'];
        $this->body = $params['body'];
        $this->summary = $params['summary'];
        $this->pub_date = $params['pub_date'];
        $this->published =
        $this->slug = $this->createSlug($params);
    }

    protected function createSlug($params) {
        if (isset($params['slug'])) {
            return $params['slug'];
        } else {
            return str_slug($params['title']);
        }
    }

}
