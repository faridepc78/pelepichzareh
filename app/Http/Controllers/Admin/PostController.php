<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Http\Requests\Admin\PostMedia\PostMediaRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\PostMediaRepository;
use App\Repositories\PostRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    private $categoryRepository;
    private $postRepository;
    private $postMediaRepository;

    public function __construct(CategoryRepository  $categoryRepository,
                                PostRepository      $postRepository,
                                PostMediaRepository $postMediaRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
        $this->postMediaRepository = $postMediaRepository;
    }

    public function c_index()
    {
        $categories = $this->categoryRepository->paginate(Category::POST);
        return view('admin.posts.categories.index', compact('categories'));
    }

    public function c_create()
    {
        return view('admin.posts.categories.create');
    }

    public function c_store(StoreCategoryRequest $request)
    {
        try {
            $this->categoryRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('posts.c_create');
    }

    public function c_edit($category_id)
    {
        $category = $this->categoryRepository->findById($category_id);
        return view('admin.posts.categories.edit', compact('category'));
    }

    public function c_update(UpdateCategoryRequest $request, $category_id)
    {
        try {
            $this->categoryRepository->update($request, $category_id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('posts.c_edit', $category_id);
    }

    public function c_destroy($category_id)
    {
        try {
            $category = $this->categoryRepository->findById($category_id);
            $category->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('posts.c_index');
    }

    public function index()
    {
        $posts = $this->postRepository->paginate();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll(Category::POST);
        return view('admin.posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $post = $this->postRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'),
                    'posts', null)->id;
                $this->postRepository->addImage($image_id, $post->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('posts.create');
    }

    public function edit($id)
    {
        $post = $this->postRepository->findById($id);
        $categories = $this->categoryRepository->getAll(Category::POST);
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $post = $this->postRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->postRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'posts', null)->id;
                    $this->postRepository->addImage($image_id, $post->id);
                    if ($post->image) {
                        $post->image->delete();
                    }
                } else {
                    $this->postRepository->update($request, $post->image_id, $id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('posts.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $post = $this->postRepository->findById($id);

                if ($post->image) {
                    $post->image->delete();
                }

                if (count($post->media)) {
                    foreach ($post->media as $media) {
                        $media->media->delete();
                    }
                }

                $post->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('projects.index');
    }

    public function m_index($post_id)
    {
        $post = $this->postRepository->findById($post_id);
        $media = $this->postMediaRepository->findMediaByPostId($post_id);
        return view('admin.posts.media.index', compact('post', 'media'));
    }

    public function m_store(PostMediaRequest $request, $post_id)
    {
        try {
            DB::transaction(function () use ($request) {
                $media = $this->postMediaRepository->store($request);
                $media_id = MediaFileService::publicUpload($request->file('media'),
                    'posts/media', null)->id;
                $this->postMediaRepository->addMedia($media_id, $media->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('posts.m_index', $post_id);
    }

    public function m_destroy($post_id, $id)
    {
        try {
            DB::transaction(function () use ($id) {
                $media = $this->postMediaRepository->findById($id);

                if ($media->media) {
                    $media->media->delete();
                }

                $media->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('posts.m_index', $post_id);
    }
}
