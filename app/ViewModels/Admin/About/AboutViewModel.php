<?php

namespace App\ViewModels\Admin\About;

use App\Services\AdminService;
use App\ViewModels\BaseViewModel;

class AboutViewModel extends BaseViewModel
{

    public $id;
    public $title;
    public $realTitle;
    public $info;
    public $realInfo;
    public $status;


    protected $_data;

    protected function populate()
    {
        $this->id = $this->_data['id'];
        $this->status = $this->_data['status'];
        $this->title = AdminService::trans($this->_data['title']);
        $this->realTitle = $this->_data['title'];
        $this->info = AdminService::trans($this->_data['info']);
        $this->realInfo = $this->_data['info'];
    }

}
