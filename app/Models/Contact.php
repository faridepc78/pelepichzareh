<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable =
        [
            'name',
            'mobile',
            'company',
            'email',
            'text',
            'type'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    const READ = 'read';
    const UNREAD = 'unread';
    static $types =
        [
            self::READ,
            self::UNREAD
        ];

    public function type()
    {
        if ($this->type == Contact::READ) {
            return '<td class="alert alert-success">' . Lang::get(self::READ) . '</td>';
        } elseif ($this->type == Contact::UNREAD) {
            return '<td class="alert alert-danger">' . Lang::get(self::UNREAD) . '</td>';
        }
    }
}
