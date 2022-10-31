<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\AdminService;
use App\Services\NewsService;
use Illuminate\Http\Request;

class SeeAllController extends Controller
{
    protected NewsService $newService;

    public function __construct(NewsService $newService)
    {
        $this->newService = $newService;
    }

    public function news()
    {
        // dd($news);
        $news = $this->newService->getNewsAll();
        return view('template::news', compact('news'));
    }

}
