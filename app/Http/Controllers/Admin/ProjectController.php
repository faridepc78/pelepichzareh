<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Http\Requests\Admin\Project\StoreProjectRequest;
use App\Http\Requests\Admin\Project\UpdateProjectRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\ProjectRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    private $categoryRepository;
    private $projectRepository;

    public function __construct(CategoryRepository $categoryRepository,
                                ProjectRepository  $projectRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->projectRepository = $projectRepository;
    }

    public function c_index()
    {
        $categories = $this->categoryRepository->paginate(Category::PROJECT);
        return view('admin.projects.categories.index', compact('categories'));
    }

    public function c_create()
    {
        return view('admin.projects.categories.create');
    }

    public function c_store(StoreCategoryRequest $request)
    {
        try {
            $this->categoryRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('projects.c_create');
    }

    public function c_edit($category_id)
    {
        $category = $this->categoryRepository->findById($category_id);
        return view('admin.projects.categories.edit', compact('category'));
    }

    public function c_update(UpdateCategoryRequest $request, $category_id)
    {
        try {
            $this->categoryRepository->update($request, $category_id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('projects.c_edit', $category_id);
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
        return redirect()->route('projects.c_index');
    }

    public function index()
    {
        $projects = $this->projectRepository->paginate();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll(Category::PROJECT);
        return view('admin.projects.create', compact('categories'));
    }

    public function store(StoreProjectRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $project = $this->projectRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'),
                    'projects', null)->id;
                $this->projectRepository->addImage($image_id, $project->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('projects.create');
    }

    public function edit($id)
    {
        $project = $this->projectRepository->findById($id);
        $categories = $this->categoryRepository->getAll(Category::PROJECT);
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $project = $this->projectRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->projectRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'projects', null)->id;
                    $this->projectRepository->addImage($image_id, $project->id);
                    if ($project->image) {
                        $project->image->delete();
                    }
                } else {
                    $this->projectRepository->update($request, $project->image_id, $id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('projects.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $project = $this->projectRepository->findById($id);

                if ($project->image) {
                    $project->image->delete();
                }

                $project->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('projects.index');
    }
}
