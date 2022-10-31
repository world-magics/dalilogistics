<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PartnersService;
use App\Services\AdminService;
use App\Models\PartnersModel;
use App\ViewModels\Admin\PaginationViewModel;
use App\ViewModels\Admin\Partners\PartnersViewModel;
use App\Requests\Admin\Partners\CreatePartnersRequest;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    protected $service;

    public function __construct(PartnersService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $filters = collect();
        $data_collection = $this->service->paginate(request()->get('page') ?: 1, AdminService::getPaginationLimit(), $filters);
        return (new PaginationViewModel($data_collection, PartnersViewModel::class))->toView('admin.partners.index');
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(CreatePartnersRequest $request)
    {
        // dd($request->all());

        $status = $request->input('status');

        $link = $request->input('link');


        $image = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('template/datlan/image'), $image);

        PartnersModel::query()->create([
            'status' => $status,
            'link' => $link,
            'image' => $image
        ]);

        return redirect()->route('admin.partners.index')->with('message', 'Баннер успешно создана');
    }

    public function delete($id)
    {
        PartnersModel::query()->findOrFail($id)->delete();
        return redirect()->route('admin.partners.index')->with('message', 'Баннер успешно удалена');
    }

    public function edit($id)
    {
        $partners = new PartnersViewModel(PartnersModel::query()->findOrFail($id));
        return view('admin.partners.edit', compact('partners'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $status = $request->input('status');

        $link = $request->input('link');


        if($request->hasFile('image'))
        {
            $partners = PartnersModel::query()->findOrFail($id);
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg,png,svg,gif|max:2048',
            ]);
            $image = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('template/datlan/image'), $image);
            $partners->image = $image;
            $partners->update();
        }

        PartnersModel::query()->findOrFail($id)->update([
            'status' => $status,
            'link' => $link,
        ]);

        return redirect()->route('admin.partners.index')->with('message', 'Баннер успешно обновлена');
    }

}
