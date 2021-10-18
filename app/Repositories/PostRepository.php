<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function store($values)
    {
        return Post::query()
            ->create([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'bio' => $values['bio'],
                'text' => $values['text'],
                'category_id' => $values['category_id'],
                'image_id' => null
            ]);
    }

    public function addImage($image_id, $id)
    {
        return Post::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function paginate()
    {
        return Post::query()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return Post::query()
            ->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return Post::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'bio' => $values['bio'],
                'text' => $values['text'],
                'category_id' => $values['category_id'],
                'image_id' => $image_id
            ]);
    }
}
