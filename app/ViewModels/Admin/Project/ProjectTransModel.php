<?php

namespace App\ViewModels\Admin\Project;

use App\Services\AdminService;
use App\ViewModels\BaseViewModel;

class ProjectTransModel extends BaseViewModel
{

    public $id;
    public $title;
    public $slug;
    public $short_info;
    public $content;
    public $image;

    protected $_data;

    protected function populate()
    {
        $this->id = $this->_data['id'];
        $this->slug = AdminService::trans($this->_data['slug']);
        $this->title = AdminService::trans($this->_data['title']);
        $this->short_info = AdminService::trans($this->_data['short_info']);
        $this->content = AdminService::trans($this->_data['content']);
        $this->image = $this->_data['image'];
    }

}