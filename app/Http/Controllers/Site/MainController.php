<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\SliderRepository;
use Exception;

class MainController extends Controller
{
    private $sliderRepository;
    private $categoryRepository;
    private $productRepository;
    private $projectRepository;
    private $postRepository;
    private $contactRepository;

    public function __construct(SliderRepository   $sliderRepository,
                                CategoryRepository $categoryRepository,
                                ProductRepository  $productRepository,
                                ProjectRepository  $projectRepository,
                                PostRepository     $postRepository,
                                ContactRepository  $contactRepository)
    {
        $this->sliderRepository = $sliderRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->projectRepository = $projectRepository;
        $this->postRepository = $postRepository;
        $this->contactRepository = $contactRepository;
    }

    protected function getCategory($slug)
    {
        return $this->categoryRepository->findById(extractId($slug));
    }

    public function home()
    {
        $sliders = $this->sliderRepository->getAll();
        $products = $this->productRepository->random();
        $projects = $this->projectRepository->random();
        return view('site.home.index', compact('sliders', 'products', 'projects'));
    }

    public function about_us()
    {
        return view('site.about-us.index');
    }

    public function contact_us()
    {
        return view('site.contact-us.index');
    }

    public function contact_us_send(ContactRequest $request)
    {
        try {
            $this->contactRepository->store($request);
            newFeedback('پیام', 'پیام شما با موفقیت ارسال شد به زودی با شما تماس میگیریم', 'success');
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('contact-us');
    }

    public function products_category($slug)
    {
        $category = $this->getCategory($slug);
        $products = $this->productRepository->findByCategoryId($category->id);
        return view('site.products.index', compact('category', 'products'));
    }

    public function projects_category($slug)
    {
        $category = $this->getCategory($slug);
        $projects = $this->projectRepository->findByCategoryId($category->id);
        return view('site.projects.index', compact('category', 'projects'));
    }

    public function posts_category($slug)
    {
        $category = $this->getCategory($slug);
        $posts = $this->postRepository->findByCategoryId($category->id);
        return view('site.posts.category.index', compact('category', 'posts'));
    }

    public function post($slug)
    {
        $post = $this->postRepository->findById(extractId($slug));
        return view('site.posts.single.index', compact('post'));
    }
}
