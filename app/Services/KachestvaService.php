<?php

namespace App\Services;

use App\DataObjects\DataObjectCollection;
use App\Models\KachestvaModel;
use App\Results\CommonIdResult;
use App\Results\CommonResult;
use App\ViewModels\Admin\Kachestva\KachestvaViewModel;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use function trans;

class KachestvaService
{
    public function paginate(int $page = 1, int $limit = 15, ?Arrayable $filters = null): DataObjectCollection
    {
        $model = KachestvaModel::query()->orderBy('id');

        $model->select('kachestva.*');

        $total_count = $model->count();

        $skip = $limit * ($page - 1);

        $items = $model->skip($skip)->take($limit)->get();

        $items->transform(function ($value) {
            $data = $value->toArray();
            $data['content'] = $data['content'];
            return $data;
        });
        return new DataObjectCollection($items, $total_count, $limit, $page);
    }

    public function getServicesAll(): \Illuminate\Database\Eloquent\Collection|Collection|array
    {
        $services = KachestvaModel::query()->where('status', 1)->orderByDesc('id')->get();
        return $services->map(function ($item) {
            $data = $item->toArray();
            return new KachestvaViewModel($data);
        });

    }

}
