<?php


namespace App\Results\Classifier;


use App\Results\BaseResult;
use App\Results\ResultContract;

/**
 * Class ClassifierCollectionResult
 * @author Azizbek Eshonaliyev <1996azizbekeshonaliyev@email.com>
 */
class ClassifierCollectionResult extends BaseResult implements ResultContract
{
    public $items;
    public $pagination;

    public function __construct($items, $pagination)
    {
        parent::__construct(['items' => $items, 'pagination' => $pagination]);
    }
}
