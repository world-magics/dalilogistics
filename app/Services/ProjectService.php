<?php

namespace App\Services;

use App\DataObjects\DataObjectCollection;
use App\Models\ProjectModel;
use App\ViewModels\Admin\Project\ProjectTransModel;
use App\Results\CommonIdResult;
use App\Results\CommonResult;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use function trans;

class ProjectService
{
    public function paginate(int $page = 1, int $limit = 15, ?Arrayable $filters = null): DataObjectCollection
    {
        $model = ProjectModel::query()->orderBy('id');

        $model->select('projects.*');

        $total_count = $model->count();

        $skip = $limit * ($page - 1);

        $items = $model->skip($skip)->take($limit)->get();

        $items->transform(function ($value) {
            $data = $value->toArray();
            $data['title'] = $data['title'];
            $data['short_info'] = $data['short_info'];
            $data['content'] = $data['content'];
            return $data;
        });
        return new DataObjectCollection($items, $total_count, $limit, $page);
    }

    public function lastProject()
    {
        $lastproject = ProjectModel::query()->orderByDesc('id')->first();
        return new ProjectTransModel($lastproject);
    }

    public function getProjectBySlug($slug)
    {
        $project = ProjectModel::query();
        foreach (AdminService::getLang() as $lang) {
            $project = $project->orWhereJsonContains('slug->'.$lang["code"], $slug);
        }
        $project = $project->firstOrFail();

        return $project;
    }

    public function getAllProject(): \Illuminate\Database\Eloquent\Collection|Collection|array
    {
        $news = ProjectModel::query()->where('status', 1)->orderByDesc('id')->get();
        return $news->map(function ($item) {
            $data = $item->toArray();
            return new ProjectTransModel($data);
        });
    }

    public function getProject($id)
    {
        $lastproject = ProjectModel::query()->findOrFail($id);
        return new ProjectTransModel($lastproject);
    }

}
