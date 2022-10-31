<?php

namespace App\ViewModels\Admin;

use App\DataObjects\DataObjectCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Fluent;

class PaginationViewModel
{
    protected DataObjectCollection $data_collection;
    protected string $view_model;

    public LengthAwarePaginator $pagination;

    /**
     * PaginationViewModel constructor.
     * @param DataObjectCollection $data_collection
     * @param string $view_model
     */
    public function __construct(DataObjectCollection $data_collection, string $view_model)
    {
        $this->data_collection = $data_collection;
        $this->view_model = $view_model;
        $data_collection->items->transform(function ($value) use ($view_model) {
            return new $view_model($value);
        });
        $parameters = request()->getQueryString();
        $parameters = preg_replace('/&page(=[^&]*)?|^page(=[^&]*)?&?/', '', $parameters);
        $path = url(request()->path()) . (empty($parameters) ? '' : '?' . $parameters);

        $this->pagination = new LengthAwarePaginator($data_collection->items, $data_collection->total_count, $data_collection->limit, $data_collection->page);
        $this->pagination->withPath($path);
    }

    /**
     * @param string $view_name
     * @param array $data
     */
    public function toView(string $view_name, array $data = []): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view($view_name, array_merge(['pagination' => $this->pagination, 'data' => new Fluent($data)]));
    }
}
