<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable =
        [
            'name',
            'slug',
            'text',
            'type'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    const PRODUCT = 'product';
    const PROJECT = 'project';
    const POST = 'post';
    static $types =
        [
            self::PRODUCT,
            self::PROJECT,
            self::POST
        ];

    public function products_path()
    {
        return route('products.category', Hashids::encode($this->id) . '-' . $this->slug);
    }

    public function projects_path()
    {
        return route('projects.category', Hashids::encode($this->id) . '-' . $this->slug);
    }

    public function posts_path()
    {
        return route('posts.category', Hashids::encode($this->id) . '-' . $this->slug);
    }
}
