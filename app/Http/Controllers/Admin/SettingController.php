<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SettingModel;
use App\Models\CategoryModel;
use App\Requests\Admin\Setting\CreateSettingRequest;
use App\Services\AdminService;
use App\Services\SettingService;
use App\ViewModels\Admin\Category\CategoryTransModel;
use App\ViewModels\Admin\Category\CategoryViewModel;
use App\ViewModels\Admin\PaginationViewModel;
use App\ViewModels\Admin\Setting\SettingViewModel;
use App\ViewModels\JsonReturnViewModel;
use Illuminate\Http\Request;


class SettingController extends Controller
{

    protected $service;

    public function __construct(SettingService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $filters = collect();
        $data_collection = $this->service->paginate(request()->get('page') ?: 1, AdminService::getPaginationLimit(), $filters);
        return (new PaginationViewModel($data_collection, SettingViewModel::class))->toView('admin.setting.index');
    }

    public function create()
    {
        return view('admin.setting.create');
    }

    public function store(CreateSettingRequest $request)
    {
        // dd($request->all());
        $key = $request->get('key');
        $value = $request->get('value');
        // dd($value);
        SettingModel::query()->create(
            [
                'key' => $key,
                'value' => $value,
            ]
        );
        return redirect()->route('admin.setting.index')->with('message', 'Настройки успешно сохранены');
    }

    public function delete($id)
    {
        SettingModel::query()->findOrFail($id)->delete();
        return redirect(route('admin.setting.index'))->with('message', 'Категория успешно удалена');
    }

    public function edit($id)
    {
        $setting = new SettingViewModel(SettingModel::query()->findOrFail($id));
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(CreateSettingRequest $request, $id)
    {
        SettingModel::query()->findOrFail($id)->update(
            [
                'key' => $request->get('key'),
                'value' => $request->get('value'),
            ]
        );
        return redirect(route('admin.setting.index'))->with('message', 'Категория успешно обновлена');
    }


}
