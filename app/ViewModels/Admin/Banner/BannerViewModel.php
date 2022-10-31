<?php

namespace App\ViewModels\Admin\Banner;

use App\Services\BannerService;
use App\Services\AdminService;
use App\ViewModels\BaseViewModel;

class BannerViewModel extends BaseViewModel
{

    public $id;
    public $title;
    public $realTitle;
    public $info;
    public $realInfo;
    public $image;
    public $status;


    protected $_data;

    protected function populate()
    {
        $this->id = $this->_data['id'];
        $this->status = $this->_data['status'];
        $this->image = $this->_data['image'];
        $this->title = AdminService::trans($this->_data['title']);
        $this->realTitle = $this->_data['title'];
        $this->info = AdminService::trans($this->_data['info']);
        $this->realInfo = $this->_data['info'];
    }

}
