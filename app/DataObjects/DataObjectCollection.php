<?php

namespace App\DataObjects;

use Illuminate\Support\Collection;

class DataObjectCollection
{
    /**
     * @var Collection
     */
    public $items;
    public $total_count;
    public $limit;
    public $page;

    public function __construct(Collection $items, int $total_count, int $limit, int $page)
    {
        $this->items = $items;
        $this->total_count = $total_count;
        $this->limit = $limit;
        $this->page = $page;
    }
}
