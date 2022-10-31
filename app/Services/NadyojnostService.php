<?php

namespace App\Services;

use App\DataObjects\DataObjectCollection;
use App\Models\NadyojnostModel;
use App\Results\CommonIdResult;
use App\Results\CommonResult;
use Illuminate\Contracts\Support\Arrayable;
use App\ViewModels\Admin\Nadyojnost\NadyojnostViewModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use function trans;

class NadyojnostService
{
    public function paginate(int $page = 1, int $limit = 15, ?Arrayable $filters = null): DataObjectCollection
    {
        $model = NadyojnostModel::query()->orderBy('id');

        $model->select('nadyojnost.*');

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

    public function getWhyMeAll(): \Illuminate\Database\Eloquent\Collection|Collection|array
    {
        $why_me = NadyojnostModel::query()->where('status', 1)->orderByDesc('id')->get();
        return $why_me->map(function ($item) {
            $data = $item->toArray();
            return new NadyojnostViewModel($data);
        });

    }
}
