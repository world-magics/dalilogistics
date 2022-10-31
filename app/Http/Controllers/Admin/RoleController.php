<?php

namespace App\Http\Controllers\Admin;

use App\DataObjects\User\CreateRoleData;
use App\DataObjects\User\UpdateRoleData;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Requests\Admin\Role\CreateRoleRequest;
use App\Requests\Admin\Role\UpdateRoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Throwable;

class RoleController extends Controller
{
    public function index()
    {
        $adminRoles = Role::query()->where("guard_name", "admin")->get();
        return view("admin.role.index", ["roles" => $adminRoles]);
    }

    public function edit($id)
    {
        return view("admin.role.edit", ["role" => Role::query()->find($id), "permissions" => Permission::all()]);
    }

    public function update(UpdateRoleRequest $request, int $id)
    {
        try {
            $data = UpdateRoleData::createFromRequest($request);
            $role = Role::query()->findOrFail($id);
            $role->update(["name" => $data->name]);
            $role->syncPermissions(array_keys($data->permissions));
            return redirect()->route("admin.role.index")->with("status", "Роль изменена успешно");
        } catch (Throwable $exception) {
            return back()->withInput()->with("status", "Роль с таким названием уже существует");
        }
    }

    public function create()
    {
        return view("admin.role.create", ["permissions" => Permission::all()]);
    }

    public function store(CreateRoleRequest $request)
    {
        try {
            $data = CreateRoleData::createFromRequest($request);
            $role = Role::create(["name" => $data->name]);
            $role->syncPermissions(array_keys($data->permissions));
            return redirect()->route("admin.role.index")->with("status", "Роль успешно создана");
        } catch (Throwable $exception) {
            return back()->withInput()->with("status", "Роль с таким названием уже существует");
        }
    }

}
