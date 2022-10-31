<?php

namespace App\ViewModels\Admin\Nadyojnost;

use App\Services\AdminService;
use App\ViewModels\BaseViewModel;

class NadyojnostViewModel extends BaseViewModel
{

    public $id;
    public $title;
    public $realTitle;
    public $content;
    public $realContent;
    public $imgurl;
    public $status;


    protected $_data;

    protected function populate()
    {
        $this->id = $this->_data['id'];
        $this->status = $this->_data['status'];
        $this->title = AdminService::trans($this->_data['title']);
        $this->realTitle = $this->_data['title'];
        $this->content = AdminService::trans($this->_data['content']);
        $this->realContent = $this->_data['content'];
        $this->imgurl = $this->_data['imgurl'];
    }

}
