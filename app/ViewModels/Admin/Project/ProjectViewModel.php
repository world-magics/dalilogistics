<?php

namespace App\ViewModels\Admin\Project;

use App\Services\AdminService;
use App\ViewModels\BaseViewModel;

class ProjectViewModel extends BaseViewModel
{

    public $id;
    public $title;
    public $slug;
    public $realTitle;
    public $short_info;
    public $realShortInfo;
    public $content;
    public $realContent;
    public $image;
    public $status;


    protected $_data;

    protected function populate()
    {
        $this->id = $this->_data['id'];
        $this->status = $this->_data['status'];
        $this->slug = AdminService::trans($this->_data['slug']);
        $this->title = AdminService::trans($this->_data['title']);
        $this->realTitle = $this->_data['title'];
        $this->short_info = AdminService::trans($this->_data['short_info']);
        $this->realShortInfo = $this->_data['short_info'];
        $this->content = AdminService::trans($this->_data['content']);
        $this->realContent = $this->_data['content'];
        $this->image = $this->_data['image'];
    }

}