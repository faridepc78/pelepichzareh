<?php

namespace App\Repositories;

use App\Models\PostMedia;

class PostMediaRepository
{
    public function findMediaByPostId($post_id)
    {
        return PostMedia::query()
            ->where('post_id', '=', $post_id)
            ->latest()
            ->paginate(10);
    }

    public function store($values)
    {
        return PostMedia::query()
            ->create([
                'post_id' => $values['post_id'],
                'media_id' => null
            ]);
    }

    public function addMedia($media_id, $id)
    {
        return PostMedia::query()
            ->where('id', '=', $id)
            ->update([
                'media_id' => $media_id
            ]);
    }

    public function findById($id)
    {
        return PostMedia::query()
            ->findOrFail($id);
    }
}
