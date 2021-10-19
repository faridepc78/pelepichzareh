<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\View\View;

class HeaderComposer
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function compose(View $view)
    {
        $products_categories = $this->categoryRepository->getAll(Category::PRODUCT);
        $projects_categories = $this->categoryRepository->getAll(Category::PROJECT);
        $posts_categories = $this->categoryRepository->getAll(Category::POST);

        $view->with([
            'products_categories' => $products_categories,
            'projects_categories' => $projects_categories,
            'posts_categories' => $posts_categories
        ]);
    }
}
