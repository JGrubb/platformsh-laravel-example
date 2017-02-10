<?php

namespace App;

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
        'published',
        'pub_date',
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

    public function getRenderedBodyAttribute()
    {
        $parser = new MarkdownExtra();
        $parser->code_class_prefix = "language-";
        return $parser->transform($this->body);
    }

    public function getRenderedSummaryAttribute($value)
    {
        if (strlen($value)) {
            return $value;
        } else {
            $truncate = new TruncateService();
            return $truncate->truncate($this->renderedBody, 500);
        }
    }

    public function getTruncatedSummaryAttribute() {
        if (strlen($this->summary)) {
            return $this->summary;
        } else {
            $truncate = new TruncateService();
            return $truncate->truncate($this->body, 500);
        }
    }

    public function getPrevAttribute()
    {
        if (isset($this->previous_id)) {
            $value = Cache::remember("previous:{$this->id}", 1, function () {
                return Post::find($this->previous_id);
            });
            return $value;
        }
    }

    public function getNextAttribute()
    {
        $value = Cache::remember("next:{$this->id}", 1, function () {
            if ($post = Post::where('previous_id', '=', $this->id)->first()) {
                return $post;
            }
        });
        return $value;
    }

    public function published_at()
    {
        $date = $this->getMutatedTimestampValue($this->pub_date);
        return $date->toDayDateTimeString();
    }

    public function getRssPubDateAttribute() {
        $date = $this->getMutatedTimestampValue($this->pub_date);
        return $date->format('r');
    }

    public function getXmlSitemapDateAttribute() {
        $date = $this->getMutatedTimestampValue($this->updated_at);
        return $date->format('Y-m-d');
    }

    public function getMutatedTimestampValue($value)
    {

        $timezone = config('app.timezone');

        return Carbon::parse($value)
            ->timezone($timezone);
    }

    protected function createSlug($params)
    {
        if (isset($params['slug'])) {
            return $params['slug'];
        } else {
            return str_slug($params['title']);
        }
    }

}
