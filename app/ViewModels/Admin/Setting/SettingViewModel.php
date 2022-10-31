<?php

namespace App\ViewModels\Admin\Setting;

use App\Services\AdminService;
use App\ViewModels\BaseViewModel;

class SettingViewModel extends BaseViewModel
{

    public $id;
    public $key;
    public $value;
    public $realValue;


    protected $_data;

    protected function populate()
    {
        $this->id = $this->_data['id'];
        $this->key = $this->_data['key'];
        $this->value = AdminService::trans($this->_data['value']);
        $this->realValue = $this->_data['value'];
    }

}
