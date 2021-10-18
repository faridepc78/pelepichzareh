<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable =
        [
            'name',
            'bio',
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
}
