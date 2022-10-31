<?php

namespace App\Services;

use App\DataObjects\DataObjectCollection;
use App\Models\PartnersModel;
use App\ViewModels\Admin\Partners\PartnersViewModel;
use App\Results\CommonIdResult;
use App\Results\CommonResult;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use function trans;

class PartnersService
{
    public function paginate(int $page = 1, int $limit = 15, ?Arrayable $filters = null): DataObjectCollection
    {
        $model = PartnersModel::query()->orderBy('id');

        $model->select('partners.*');

        $total_count = $model->count();

        $skip = $limit * ($page - 1);

        $items = $model->skip($skip)->take($limit)->get();

        $items->transform(function ($value) {
            $data = $value->toArray();
            $data['link'] = $data['link'];
            return $data;
        });
        return new DataObjectCollection($items, $total_count, $limit, $page);
    }

    public function getPartnersAll(): \Illuminate\Database\Eloquent\Collection|Collection|array
    {
        $partners = PartnersModel::query()->where('status', 1)->orderByDesc('id')->get();
        return $partners->map(function ($item) {
            $data = $item->toArray();
            return new PartnersViewModel($data);
        });

    }

}
