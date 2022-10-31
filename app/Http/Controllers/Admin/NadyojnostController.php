<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdminService;
use App\ViewModels\Admin\PaginationViewModel;
use App\ViewModels\Admin\Nadyojnost\NadyojnostViewModel;
use App\Requests\Admin\Nadyojnost\CreateNadyojnostRequest;
use App\Requests\Admin\Nadyojnost\EditNadyojnostRequest;
use App\Models\NadyojnostModel;
use App\ViewModels\JsonReturnViewModel;
use App\Services\NadyojnostService;

class NadyojnostController extends Controller
{
    protected $service;

    public function __construct(NadyojnostService $service)
    {
        $this->service = $service;
    }

    public function index(){

        $filters = collect();
        $data_collection = $this->service->paginate(request()->get('page') ?: 1, AdminService::getPaginationLimit(), $filters);
        return (new PaginationViewModel($data_collection, NadyojnostViewModel::class))->toView('admin.nadyojnost.index');

    }

    public function create()
    {
        return view('admin.nadyojnost.create');
    }

    public function store(CreateNadyojnostRequest $request)
    {
        // dd($request->all());

        $status = $request->input('status');

        $title = $request->input('title');

        $content = $request->input('content');

        // $image = time().'_'.$request->file('imgurl')->getClientOriginalName();
        // $request->file('imgurl')->move(public_path('template/datlan/images'),$image);

        NadyojnostModel::query()->create([
            'status' => $status,
            'title' => $title,
            'content' => $content,
            // 'imgurl' => $image ?? null,
        ]);

        return redirect()->route('admin.nadyojnost.index')->with('message', 'Информационная работа успешно создана');
    }

    public function delete($id)
    {
        NadyojnostModel::query()->findOrFail($id)->delete();
        return redirect(route('admin.nadyojnost.index'))->with('message', 'Информационная работа успешно удалена');
    }

    public function edit($id)
    {
        $nadyojnost = new NadyojnostViewModel(NadyojnostModel::query()->findOrFail($id));
        return view('admin.nadyojnost.edit', compact('nadyojnost'));
    }

    public function update(Request $request, $id)
    {
        $data = NadyojnostModel::query()->findOrFail($id);
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

        NadyojnostModel::query()->findOrFail($id)->update(
            [
                'status' => $request->input('status'),
                'title' => $request->input('title'),
                'content' => $request->input('content'),
            ]
        );
        return redirect(route('admin.nadyojnost.index'))->with('message', 'О нас успешно обновлена');
    }

}
