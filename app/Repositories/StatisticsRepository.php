<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Models\Post;
use App\Models\Product;
use App\Models\Project;

class StatisticsRepository
{
    public function getCountProducts()
    {
        return Product::query()
            ->count();
    }

    public function getCountProjects()
    {
        return Project::query()
            ->count();
    }

    public function getCountPosts()
    {
        return Post::query()
            ->count();
    }

    public function getCountContacts()
    {
        return Contact::query()
            ->count();
    }
}
