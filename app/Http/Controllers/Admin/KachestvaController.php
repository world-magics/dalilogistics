<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdminService;
use App\ViewModels\Admin\PaginationViewModel;
use App\ViewModels\Admin\Kachestva\KachestvaViewModel;
use App\Requests\Admin\Kachestva\CreateKachestvaRequest;
use App\Requests\Admin\Kachestva\EditKachestvaRequest;
use App\Models\KachestvaModel;
use App\ViewModels\JsonReturnViewModel;
use App\Services\KachestvaService;

class KachestvaController extends Controller
{
    protected $service;

    public function __construct(KachestvaService $service)
    {
        $this->service = $service;
    }

    public function index(){

        $filters = collect();
        $data_collection = $this->service->paginate(request()->get('page') ?: 1, AdminService::getPaginationLimit(), $filters);
        return (new PaginationViewModel($data_collection, KachestvaViewModel::class))->toView('admin.kachestva.index');

    }

    public function create()
    {
        return view('admin.kachestva.create');
    }

    public function store(CreateKachestvaRequest $request)
    {
        // dd($request->all());

        $status = $request->input('status');

        $title = $request->input('title');

        $content = $request->input('content');

        $image = time().'_'.$request->file('imgurl')->getClientOriginalName();
        $request->file('imgurl')->move(public_path('template/datlan/images'),$image);

        KachestvaModel::query()->create([
            'status' => $status,
            'title' => $title,
            'content' => $content,
            'imgurl' => $image
        ]);

        return redirect()->route('admin.kachestva.index')->with('message', 'Информационная работа успешно создана');
    }

    public function delete($id)
    {
        KachestvaModel::query()->findOrFail($id)->delete();
        return redirect(route('admin.kachestva.index'))->with('message', 'Информационная работа успешно удалена');
    }

    public function edit($id)
    {
        $kachestva = new KachestvaViewModel(KachestvaModel::query()->findOrFail($id));
        return view('admin.kachestva.edit', compact('kachestva'));
    }

    public function update(Request $request, $id)
    {
        $data = KachestvaModel::query()->findOrFail($id);
        // dd($request->all());

        if( $request->hasFile('imgurl')){
            $request->validate([
                'imgurl' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $image = time().'_'.$request->file('imgurl')->getClientOriginalName();
            $request->file('imgurl')->move(public_path('template/datlan/images'),$image);
            $data->imgurl = $image;
            $data->update();
        }

        KachestvaModel::query()->findOrFail($id)->update(
            [
                'status' => $request->input('status'),
                'title' => $request->input('title'),
                'content' => $request->input('content'),
            ]
        );
        return redirect(route('admin.kachestva.index'))->with('message', 'О нас успешно обновлена');
    }

}
