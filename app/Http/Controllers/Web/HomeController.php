<?php

namespace App\Http\Controllers\Web;

use App\Services\ProjectService;
use App\Services\NewsService;
use App\Services\PartnersService;
use App\Models\ProjectModel;
use App\Models\AboutModel;
use App\Models\KachestvaModel;
use App\Models\BannerModel;
use App\Models\MessageModel;
use App\ViewModels\Admin\About\AboutViewModel;
use App\ViewModels\Admin\Kachestva\KachestvaViewModel;
use App\ViewModels\Admin\Nadyojnost\NadyojnostViewModel;
use App\ViewModels\Admin\Banner\BannerViewModel;
use App\ViewModels\Admin\Partners\PartnersViewModel;
use App\Models\NadyojnostModel;
use App\Models\PartnersModel;
use App\ViewModels\Admin\Project\ProjectTransModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    protected ProjectService $projectService;
    protected NewsService $newsService;
    protected PartnersService $partnersService;

    public function __construct(ProjectService $projectService, NewsService $newsService, PartnersService $partnersService)
    {
        $this->projectService = $projectService;
        $this->newsService = $newsService;
        $this->partnersService = $partnersService;
    }

    public function index()
    {
        $lastProject = new ProjectTransModel(ProjectModel::query()->orderByDesc('id')->first());
        $about = new AboutViewModel(AboutModel::query()->orderByDesc('id')->first());
        // $kachestva = new KachestvaViewModel(KachestvaModel::query()->orderByDesc('id'));
        // $nadyojnost = new NadyojnostViewModel(NadyojnostModel::query()->orderByDesc('id')->first());
        $banner = new BannerViewModel(BannerModel::query()->orderByDesc('id')->first());
        // $partners = $this->partnersService->getPartnersAll();
        $news = $this->newsService->getLastNews();
        // dd($news);

        return view('template::home', compact('lastProject', 'about', 'banner','news'));
    }

    public function store(Request $request)
    {
        $full_name = $request->input('fullName');
        $email = $request->input('email');
        $content = $request->input('info');

        MessageModel::query()->create([
            'full_name' => $full_name,
            'email'  => $email,
            'content' => $content,
        ]);

        return redirect()->route('web.index')->with('message', 'сообщение');
    }

}
