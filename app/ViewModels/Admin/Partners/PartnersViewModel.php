<?php

namespace App\ViewModels\Admin\Partners;

use App\Services\PartnersService;
use App\Services\AdminService;
use App\ViewModels\BaseViewModel;

class PartnersViewModel extends BaseViewModel
{

    public $id;
    public $link;
    public $image;
    public $status;


    protected $_data;

    protected function populate()
    {
        $this->id = $this->_data['id'];
        $this->status = $this->_data['status'];
        $this->image = $this->_data['image'];
        $this->link=$this->_data['link'];
    }

}
