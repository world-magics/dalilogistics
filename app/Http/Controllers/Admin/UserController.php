<?php

namespace App\Http\Controllers\Admin;

use App\DataObjects\User\UpdateRoleData;
use App\DataObjects\User\UserData;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Requests\Admin\User\CreateUserRequest;
use App\Requests\Admin\User\UpdateUserRequest;
use Spatie\Permission\Models\Role;
use Throwable;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("admin.user.index", ["users" => $users]);
    }

    public function edit($id)
    {
        return view("admin.user.edit", ["user" => User::query()->find($id), "roles" => Role::all()]);
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        try {
            $data = UserData::createFromRequest($request);
            $user = User::query()->find($id);
            $user->update(["name" => $data->name]);
            $user->syncRoles(array_keys($data->roles));
            return redirect()->route("admin.user.index")->with("status", "Роль изменена успешно");
        } catch (Throwable $exception) {
            return back()->withInput()->with("status", "Роль с таким названием уже существует");
        }
    }

    public function create()
    {
        return view("admin.user.create", ["roles" => Role::all()]);
    }

    public function store(CreateUserRequest $request)
    {
        try {
            $data = UserData::createFromRequest($request);
            $data->password = bcrypt($data->password);
            /** @var User $user */
            $user = User::create($data->all(true));
            $user->syncRoles(array_keys($data->roles));
            return redirect()->route("admin.user.index")->with("status", "User успешно создана");
        } catch (Throwable $exception) {
            return back()->withInput()->with("status", $exception->getMessage());
        }
    }

}
