<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $categoryRepository;
    private $productRepository;

    public function __construct(CategoryRepository $categoryRepository,
                                ProductRepository  $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function c_index()
    {
        $categories = $this->categoryRepository->paginate(Category::PRODUCT);
        return view('admin.products.categories.index', compact('categories'));
    }

    public function c_create()
    {
        return view('admin.products.categories.create');
    }

    public function c_store(StoreCategoryRequest $request)
    {
        try {
            $this->categoryRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.c_create');
    }

    public function c_edit($category_id)
    {
        $category = $this->categoryRepository->findById($category_id);
        return view('admin.products.categories.edit', compact('category'));
    }

    public function c_update(UpdateCategoryRequest $request, $category_id)
    {
        try {
            $this->categoryRepository->update($request, $category_id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.c_edit', $category_id);
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
        return redirect()->route('products.c_index');
    }

    public function index()
    {
        $products = $this->productRepository->paginate();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll(Category::PRODUCT);
        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $product = $this->productRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'),
                    'products', null)->id;
                $this->productRepository->addImage($image_id, $product->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.create');
    }

    public function edit($id)
    {
        $product = $this->productRepository->findById($id);
        $categories = $this->categoryRepository->getAll(Category::PRODUCT);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $product = $this->productRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->productRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'products', null)->id;
                    $this->productRepository->addImage($image_id, $product->id);
                    if ($product->image) {
                        $product->image->delete();
                    }
                } else {
                    $this->productRepository->update($request, $product->image_id, $id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $product = $this->productRepository->findById($id);

                if ($product->image) {
                    $product->image->delete();
                }

                $product->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.index');
    }
}
