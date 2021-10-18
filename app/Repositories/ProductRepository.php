<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function store($values)
    {
        return Product::query()
            ->create([
                'name' => $values['name'],
                'bio' => $values['bio'],
                'category_id' => $values['category_id'],
                'image_id' => null
            ]);
    }

    public function addImage($image_id, $id)
    {
        return Product::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function paginate()
    {
        return Product::query()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return Product::query()
            ->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return Product::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'bio' => $values['bio'],
                'category_id' => $values['category_id'],
                'image_id' => $image_id
            ]);
    }
}
