<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function addImage($image_id, $id)
    {
        return User::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function findById($id)
    {
        return User::query()
            ->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return User::query()
            ->where('id', '=', $id)
            ->update([
                'f_name' => $values['f_name'],
                'l_name' => $values['l_name'],
                'email' => $values['email'],
                'mobile' => $values['mobile'],
                'image_id' => $image_id
            ]);
    }

    public function updatePassword($password, $id)
    {
        return User::query()
            ->where('id', '=', $id)
            ->update([
                'password' => bcrypt($password)
            ]);
    }
}
