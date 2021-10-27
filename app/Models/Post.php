<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable =
        [
            'name',
            'slug',
            'bio',
            'text',
            'category_id',
            'image_id'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id')->withDefault();
    }

    public function media()
    {
        return $this->hasMany(PostMedia::class, 'post_id');
    }

    public function path()
    {
        return route('post', Hashids::encode($this->id) . '-' . $this->slug);
    }
}
