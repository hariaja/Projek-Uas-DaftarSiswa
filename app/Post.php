<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $fillable = ['user_id', 'title', 'content', 'slug', 'thumbnail'];
    protected $dates = ['created_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
        // if (!$this->thumbnail) {
        //     return asset('images/post/no-thumbnail.jpg');
        // }
        // return asset('images/post/' . $this->thumbnail);

        return !$this->thumbnail ? asset('images/post/no-thumbnail.jpg') : asset('images/post/' . $this->thumbnail);
    }

    public function limit_content()
    {
        return Str::limit($this->content, 100);
    }
}
