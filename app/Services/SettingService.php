<?php

namespace App\Services;

use App\DataObjects\DataObjectCollection;
use App\Models\CategoryModel;
use App\Models\SettingModel;
use App\Results\CommonIdResult;
use App\Results\CommonResult;
use App\Services\Admin\Setting\CategoryData;
use App\Services\Admin\Setting\OperationException;
use Illuminate\Contracts\Support\Arrayable;
use function trans;


class SettingService
{
    /**
     * @param int $page
     * @param int $limit
     * @param Arrayable|null $filters
     * @return DataObjectCollection
     */
    public function paginate(int $page = 1, int $limit = 15, ?Arrayable $filters = null): DataObjectCollection
    {
        $model = SettingModel::query()->orderBy('id');
//        if (!is_null($filters)) {
//            foreach ($filters as $filter) {
//                if ($filter instanceof EloquentFilterContract)
//                    $model = $filter->applyEloquent($model);
//            }
//        }

        $model->select('setting.*');

        $total_count = $model->count();

        $skip = $limit * ($page - 1);

        $items = $model->skip($skip)->take($limit)->get();

        $items->transform(function ($value) {
            $data = $value->toArray();
            $data['value'] = $data['value'];
            return $data;
        });
        return new DataObjectCollection($items, $total_count, $limit, $page);
    }


    /**
     * @param CategoryData $data
     * @return CommonIdResult
     * @throws OperationException
     */


    /**
     * @param int $id
     * @return CommonResult
     * @throws OperationException
     */

}
