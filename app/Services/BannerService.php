<?php

namespace App\Services;

use App\DataObjects\DataObjectCollection;
use App\Models\BannerModel;
use App\Results\CommonIdResult;
use App\Results\CommonResult;
use Illuminate\Contracts\Support\Arrayable;
use function trans;

class BannerService
{
    public function paginate(int $page = 1, int $limit = 15, ?Arrayable $filters = null): DataObjectCollection
    {
        $model = BannerModel::query()->orderBy('id');

        $model->select('banners.*');

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
}
