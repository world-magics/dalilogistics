<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProjectService;
use App\Services\AdminService;
use App\ViewModels\Admin\PaginationViewModel;
use App\Models\ProjectModel;
use App\ViewModels\Admin\Project\ProjectViewModel;
use App\Requests\Admin\Project\CreateProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $filters = collect();
        $data_collection = $this->service->paginate(request()->get('page') ?: 1, AdminService::getPaginationLimit(), $filters);
        return (new PaginationViewModel($data_collection, ProjectViewModel::class))->toView('admin.project.index');
    }
    
    public function create()
    {
        return view('admin.project.create');
    }

    public function store(CreateProjectRequest $request)
    {
        // dd($request->all());

        $title = $request->input('title');

        $status = $request->input('status');

        $short_info = $request->input('short_info');

        $content = $request->input('content');

        $slug = [];
            foreach ($title as $key => $value) {
                $slug[$key] = AdminService::slug($value);
            }

        $image = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('template/datlan/images'),$image);

        ProjectModel::query()->create([
            'title' => $title,
            'slug' => $slug,
            'short_info' => $short_info,
            'content' => $content,
            'status' => $status,
            'image' => $image,
        ]);

        return redirect()->route('admin.project.index')->with('message', 'Проект успешно создана');
    }

    public function delete($id)
    {
        ProjectModel::query()->findOrFail($id)->delete();
        return redirect()->route('admin.project.index')->with('message','Проект успешно удалена');
    }

    public function edit($id)
    {
        $project = new ProjectViewModel(ProjectModel::query()->findOrFail($id));
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $title = $request->input('title');

        $status = $request->input('status');

        $short_info = $request->input('short_info');

        $content = $request->input('content');

        $slug = [];
            foreach ($title as $key => $value) {
                $slug[$key] = AdminService::slug($value);
        }

        if ($request->hasFile('image')) {
            $project = ProjectModel::query()->findOrFail($id);
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('template/datlan/images'),$image);
            $project->image = $image;
            $project->update();
        }
        

        ProjectModel::query()->findOrFail($id)->update([
            'title' => $title,
            'slug' => $slug,
            'short_info' => $short_info,
            'content' => $content,
            'status' => $status,
        ]);

        return redirect()->route('admin.project.index')->with('message', 'Проект успешно обновлена');
    }
}
