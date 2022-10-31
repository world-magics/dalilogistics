<?php

namespace App\Services;

use App\DataObjects\DataObjectCollection;
use App\Models\MenuModel;
use App\Results\CommonIdResult;
use App\Results\CommonResult;
use Illuminate\Contracts\Support\Arrayable;
use function trans;

class MenuService
{
    public function paginate(int $page = 1, int $limit = 15, ?Arrayable $filters = null): DataObjectCollection
    {
        $model = MenuModel::query()->orderBy('id');

        $model->select('menus.*');

        $total_count = $model->count();

        $skip = $limit * ($page - 1);

        $items = $model->skip($skip)->take($limit)->get();

        $items->transform(function ($value) {
            $data = $value->toArray();
            $data['title'] = $data['title'];
            return $data;
        });
        return new DataObjectCollection($items, $total_count, $limit, $page);
    }
}
