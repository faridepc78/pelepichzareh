<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable =
        [
            'f_name',
            'l_name',
            'email',
            'mobile',
            'password',
            'image_id',
            'remember_token'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id')->withDefault();
    }

    public function getFullNameAttribute()
    {
        return $this->f_name . ' ' . $this->l_name;
    }

    public function getProfileAttribute()
    {
        return empty($this->image->files)
            ? asset('assets/common/images/profile.png')
            : "/uploads/" . $this->image->files['original'];
    }
}
