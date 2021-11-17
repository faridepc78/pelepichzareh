<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\StatisticsRepository;

class DashboardController extends Controller
{
    private $statisticsRepository;

    public function __construct(StatisticsRepository $statisticsRepository)
    {
        $this->statisticsRepository = $statisticsRepository;
    }

    public function index()
    {
        $products = $this->statisticsRepository->getCountProducts();
        $projects = $this->statisticsRepository->getCountProjects();
        $posts = $this->statisticsRepository->getCountPosts();
        $contacts = $this->statisticsRepository->getCountContacts();
        return view('admin.dashboard.index',
            compact('products', 'projects', 'posts', 'contacts'));
    }
}
