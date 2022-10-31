<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\NewsService;
use App\Services\AdminService;
use App\ViewModels\Admin\PaginationViewModel;
use App\ViewModels\Admin\News\NewsViewModel;
use App\Requests\Admin\News\CreateNewsRequest;
use App\Models\NewsModel;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $service;

    public function __construct(NewsService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $filters = collect();
        $data_collection = $this->service->paginate(request()->get('page')?: 1, AdminService::getPaginationLimit(), $filters);
        return (new PaginationViewModel($data_collection, NewsViewModel::class))->toView('admin.news.index');
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(CreateNewsRequest $request)
    {
        // dd($request->all());
        $title = $request->input('title');

        $status = $request->input('status');

        $info = $request->input('info');

        $slug = [];
            foreach ($title as $key => $value) {
                $slug[$key] = AdminService::slug($value);
            }

        $image = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('template/datlan/images'),$image);

        NewsModel::query()->create([
            'title' => $title,
            'slug' => $slug,
            'info' => $info,
            'status' => $status,
            'image' => $image,
        ]);

        return redirect()->route('admin.news.index')->with('message', 'Новости успешно создана');
    }

    public function delete($id)
    {
        NewsModel::query()->findOrFail($id)->delete();
        return redirect()->route('admin.news.index')->with('message','Новости успешно удалена');
    }

    public function edit($id)
    {
        $news = new NewsViewModel(NewsModel::query()->findOrFail($id));
        return view('admin.news.edit', compact('news'));
    }

     public function update(Request $request, $id)
    {
        // dd($request->all());

        $title = $request->input('title');

        $status = $request->input('status');

        $info = $request->input('info');

        $slug = [];
            foreach ($title as $key => $value) {
                $slug[$key] = AdminService::slug($value);
        }

        if ($request->hasFile('image')) {
            $project = NewsModel::query()->findOrFail($id);
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('template/datlan/images'),$image);
            $project->image = $image;
            $project->update();
        }
        

        NewsModel::query()->findOrFail($id)->update([
            'title' => $title,
            'slug' => $slug,
            'info' => $info,
            'status' => $status,
        ]);

        return redirect()->route('admin.news.index')->with('message', 'Новости успешно обновлена');
    }
}
