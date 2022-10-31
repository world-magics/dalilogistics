<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MessageModel;

use App\ViewModels\JsonReturnViewModel;


class MessageController extends Controller
{
    public function index()
    {
        $data = MessageModel::query()->orderByDesc('id')->paginate(15);
        return view('admin.message.index', compact('data'));
    }

}
