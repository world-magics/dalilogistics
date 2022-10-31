<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use App\Services\AdminService;
use App\Models\BannerModel;
use App\ViewModels\Admin\PaginationViewModel;
use App\ViewModels\Admin\Banner\BannerViewModel;
use App\Requests\Admin\Banner\CreateBannerRequest;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $service;

    public function __construct(BannerService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $filters = collect();
        $data_collection = $this->service->paginate(request()->get('page') ?: 1, AdminService::getPaginationLimit(), $filters);
        return (new PaginationViewModel($data_collection, BannerViewModel::class))->toView('admin.banner.index');
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(CreateBannerRequest $request)
    {
        // dd($request->all());

        $status = $request->input('status');

        $title = $request->input('title');

        $info = $request->input('info');

        $image = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('template/datlan/image'), $image);

        BannerModel::query()->create([
            'status' => $status,
            'title' => $title,
            'info' => $info,
            'image' => $image
        ]);

        return redirect()->route('admin.banner.index')->with('message', 'Баннер успешно создана');
    }

    public function delete($id)
    {
        BannerModel::query()->findOrFail($id)->delete();
        return redirect()->route('admin.banner.index')->with('message', 'Баннер успешно удалена');
    }

    public function edit($id)
    {
        $banner = new BannerViewModel(BannerModel::query()->findOrFail($id));
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $status = $request->input('status');

        $title = $request->input('title');

        $info = $request->input('info');

        if($request->hasFile('image'))
        {
            $banner = BannerModel::query()->findOrFail($id);
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg,png,svg,gif|max:2048',
            ]);
            $image = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('template/datlan/image'), $image);
            $banner->image = $image;
            $banner->update();
        }

        BannerModel::query()->findOrFail($id)->update([
            'status' => $status,
            'title' => $title,
            'info' => $info,
        ]);

        return redirect()->route('admin.banner.index')->with('message', 'Баннер успешно обновлена');
    }

}
