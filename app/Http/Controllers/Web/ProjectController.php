<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\ProjectService;
use App\Services\AdminService;
use App\ViewModels\Web\Project\ProjectSlugViewModel;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected ProjectService $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $projects = $this->service->getAllProject();
        return view('template::projects', compact('projects'));
    }

    public function show($id)
    {
        $project = $this->service->getProject($id);
        return view('template::project', compact('project'));
    }
}
