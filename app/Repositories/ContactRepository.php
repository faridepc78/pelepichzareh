<?php

namespace App\Repositories;

use App\Filters\Contact\Search;
use App\Filters\Contact\Type;
use App\Models\Contact;
use Illuminate\Pipeline\Pipeline;

class ContactRepository
{
    public function store($values)
    {
        return Contact::query()
            ->create([
                'name' => $values['name'],
                'mobile' => $values['mobile'],
                'company' => $values['company'],
                'email' => $values['email'],
                'text' => $values['text'],
                'type' => $values['type']
            ]);
    }

    public function paginate()
    {
        return app(Pipeline::class)
            ->send(Contact::query())
            ->through([
                Type::class,
                Search::class
            ])
            ->thenReturn()
            ->orderBy('type', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function findById($id)
    {
        return Contact::query()
            ->findOrFail($id);
    }

    public function updateType($id)
    {
        return Contact::query()
            ->where('id', '=', $id)
            ->update([
                'type' => Contact::READ
            ]);
    }
}
