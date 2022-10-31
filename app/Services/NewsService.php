<?php

namespace App\Services;

use App\DataObjects\DataObjectCollection;
use App\Models\NewsModel;
use App\ViewModels\Admin\News\NewsViewModel;
use App\Results\CommonIdResult;
use App\Results\CommonResult;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use function trans;

class NewsService
{
    public function paginate(int $page = 1, int $limit = 15, ?Arrayable $filters = null): DataObjectCollection
    {
        $model = NewsModel::query()->orderBy('id');

        $model->select('news.*');

        $total_count = $model->count();

        $skip = $limit * ($page - 1);

        $items = $model->skip($skip)->take($limit)->get();

        $items->transform(function ($value) {
            $data = $value->toArray();
            $data['title'] = $data['title'];
            $data['info'] = $data['info'];
            return $data;
        });
        return new DataObjectCollection($items, $total_count, $limit, $page);
    }

    public function getLastNews(): \Illuminate\Database\Eloquent\Collection|Collection|array
    {
        $news = NewsModel::query()->where('status', 1)->orderByDesc('id')->limit(4)->get();
        return $news->map(function ($item) {
            $data = $item->toArray();
            return new NewsViewModel($data);
        });
    }

    public function getNewsAll(): \Illuminate\Database\Eloquent\Collection|Collection|array
    {
        $news = NewsModel::query()->where('status', 1)->orderByDesc('id')->get();
        return $news->map(function ($item) {
            $data = $item->toArray();
            return new NewsViewModel($data);
        });
    }

}
