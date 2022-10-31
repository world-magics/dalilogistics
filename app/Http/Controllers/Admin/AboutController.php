<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Services\AboutService;
use App\Models\AboutModel;
use App\ViewModels\Admin\PaginationViewModel;
use App\ViewModels\Admin\About\AboutViewModel;
use App\Requests\Admin\About\CreateAboutRequest;
use App\ViewModels\JsonReturnViewModel;


class AboutController extends Controller
{
    protected $service;

    public function __construct(AboutService $service)
    {
        $this->service = $service;
    }

    public function index(){

        $filters = collect();
        $data_collection = $this->service->paginate(request()->get('page') ?: 1, AdminService::getPaginationLimit(), $filters);
        return (new PaginationViewModel($data_collection, AboutViewModel::class))->toView('admin.about.index');

    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(CreateAboutRequest $request)
    {
        // dd($request->all());

        $status = $request->input('status');

        $title = $request->input('title');

        $info = $request->input('info');

        AboutModel::query()->create([
            'status' => $status,
            'title' => $title,
            'info' => $info,
        ]);

        return redirect()->route('admin.about.index')->with('message', 'О нас успешно создана');
    }

    public function delete($id)
    {
        AboutModel::query()->findOrFail($id)->delete();
        return redirect(route('admin.about.index'))->with('message', 'О нас успешно удалена');
    }

    public function edit($id)
    {
        $about = new AboutViewModel(AboutModel::query()->findOrFail($id));
        return view('admin.about.edit', compact('about'));
    }

    public function update(CreateAboutRequest $request, $id)
    {
        AboutModel::query()->findOrFail($id)->update(
            [
                'status' => $request->input('status'),
                'title' => $request->input('title'),
                'info' => $request->input('info'),
            ]
        );
        return redirect(route('admin.about.index'))->with('message', 'О нас успешно обновлена');
    }

}
