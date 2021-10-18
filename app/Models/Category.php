<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
