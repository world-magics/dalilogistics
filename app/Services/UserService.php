<?php

namespace App\Services;

use App\DataObjects\Auth\AuthData;
use App\DataObjects\DataObjectCollection;
use App\DataObjects\User\RoleData;
use App\DataObjects\User\UserData;
use App\Exceptions\OperationException;
use App\Filters\EloquentFilterContract;
use App\Models\Eloquent\PermissionModel;
use App\Models\Eloquent\RoleModel;
use App\Models\Eloquent\UserModel;
use App\Models\User;
use App\Results\CommonIdResult;
use App\Results\CommonResult;
use App\Results\User\CheckUserAuthResult;
use Illuminate\Contracts\Support\Arrayable;

class UserService
{
    public function getUsers(int $limit = 15, ?Arrayable $filters = null)
    {
        $model = UserModel::query()->with('roles')
            ->orderBy('users.created_at', 'DESC');
        if (!is_null($filters)) {
            foreach ($filters as $filter) {
                if ($filter instanceof EloquentFilterContract)
                    $model = $filter->applyEloquent($model);
            }
        }
        $model->select('users.*');
        $items = $model->take($limit)->get();
        $items->transform(function ($value) {
            $data = $value->toArray();
            $data = array_merge($data, [
                'roles' => $value->roles->map(function ($role) {
                    return $role->id;
                })->toArray()
            ]);
            return new UserData($data);
        });
        return $items;
    }

    /**
     * @param int $page
     * @param int $limit
     * @param Arrayable|null $filters
     * @return DataObjectCollection
     */
    public function paginateUsers(int $page = 1, int $limit = 15, ?Arrayable $filters = null): DataObjectCollection
    {
        $model = UserModel::query()
            ->with('roles')
            ->orderBy('users.created_at', 'DESC');
        if (!is_null($filters)) {
            foreach ($filters as $filter) {
                if ($filter instanceof EloquentFilterContract)
                    $model = $filter->applyEloquent($model);
            }
        }

        $model->select('users.*');

        $total_count = $model->count();

        $skip = $limit * ($page - 1);

        $items = $model
            ->skip($skip)
            ->take($limit)
            ->get();

        $items->transform(function ($value) {
            $data = $value->toArray();
            $data = array_merge($data, [
                'roles' => $value->roles()->get()->map(function ($role) {
                    return $role->id;
                })->toArray()
            ]);
            return new UserData($data);
        });

        return new DataObjectCollection($items, $total_count, $limit, $page);
    }

    /**
     * @param int $id
     * @return UserData
     * @throws OperationException
     */
    public function getUser(int $id): UserData
    {
        $item = UserModel::query()->find($id);
        if (is_null($item)) {
            throw new OperationException(trans('errors.item_not_found'));
        }
        $data = $item->toArray();
        return new UserData($data);
    }

    /**
     * @param UserData $data
     * @return CommonIdResult
     * @throws OperationException
     */
    public function storeUser(UserData $data): CommonIdResult
    {
        if (is_null($data->id)) {
            $create_user = collect($data->all())->only((new UserModel())->getFillable())->toArray();
            $create_user['password'] = bcrypt($create_user['password']);
            $user = UserModel::query()
                ->create($create_user);
            try {
                $user->attachRole($data->roles);
            } catch (\Exception $exception) {

            }
            return (new CommonIdResult($user->id));
        } else {
            $user = UserModel::query()->find($data->id);
            if (is_null($user)) {
                throw new OperationException(trans('errors.item_not_found'));
            }
            $update_user = collect($data->all())->only(['full_name', 'username', 'phone_numbers', 'password', 'status'])->toArray();
            if (!empty($update_user['password'])) {
                $update_user['password'] = bcrypt($update_user['password']);
            } else {
                unset($update_user['password']);
            }
            $user->update($update_user);
            $user->syncRoles($data->roles);
            return (new CommonIdResult($data->id));
        }
    }

    /**
     * @param int $id
     * @return CommonResult
     * @throws OperationException
     */
    public function deleteUser(int $id): CommonResult
    {
        $item = UserModel::query()->find($id);
        if (is_null($item)) {
            throw new OperationException(trans('errors.item_not_found'));
        }
        $item->delete();
        return new CommonResult();
    }

    /**
     * @param AuthData $data
     * @param bool $login_for_admin
     * @return CheckUserAuthResult
     */
    public function checkUserAuth(AuthData $data, bool $login_for_admin = false): CheckUserAuthResult
    {
        $res = new CheckUserAuthResult();
        /** @var User $user */
        $user = User::query()
            ->where('username', $data->username)
            ->first();
        if (is_null($user) || !$user->isActive()) {
            return $res->setError(trans('all.error_auth_failed'));
        }
        if ($login_for_admin) {
            if (!in_array("admin-panel", $user->getPermissionsViaRoles()->pluck("name")->toArray())) {
                return $res->setError(trans('all.error_auth_failed'));
            }
        }

        return $res;
    }

    /**
     * @param int $page
     * @param int $limit
     * @param Arrayable|null $filters
     * @return DataObjectCollection
     */
    public function paginateRoles(int $page = 1, int $limit = 15, ?Arrayable $filters = null): DataObjectCollection
    {
        $model = RoleModel::query()
            ->with('permissions')
            ->orderBy('roles.created_at', 'DESC');
        if (!is_null($filters)) {
            foreach ($filters as $filter) {
                if ($filter instanceof EloquentFilterContract)
                    $model = $filter->applyEloquent($model);
            }
        }

        $model->select('roles.*');

        $total_count = $model->count();

        $skip = $limit * ($page - 1);

        $items = $model
            ->skip($skip)
            ->take($limit)
            ->get();

        $items->transform(function ($value) {
            $data = $value->toArray();
            $data = array_merge($data, [
                'permissions' => $value->permissions->map(function ($permission) {
                    return $permission->name;
                })->toArray()
            ]);
            return new RoleData($data);
        });

        return new DataObjectCollection($items, $total_count, $limit, $page);
    }

    /**
     * @param int $id
     * @return RoleData
     * @throws OperationException
     */
    public function getRole(int $id): RoleData
    {
        $item = RoleModel::query()->find($id);
        if (is_null($item)) {
            throw new OperationException(trans('errors.item_not_found'));
        }
        $data = $item->toArray();
        $data = array_merge($data, [
            'permissions' => $item->permissions->map(function ($permission) {
                return $permission->name;
            })->toArray()
        ]);
        return new RoleData($data);
    }

    /**
     * @param RoleData $data
     * @return CommonIdResult
     * @throws OperationException
     */
    public function storeRole(RoleData $data): CommonIdResult
    {
        $role = null;
        if (is_null($data->id)) {
            $create_role = collect($data->all())->only((new RoleModel())->getFillable())->toArray();
            $role = RoleModel::query()
                ->create($create_role);
        } else {
            $role = RoleModel::query()->find($data->id);
            if (is_null($role)) {
                throw new OperationException(trans('errors.item_not_found'));
            }
            $update_role = collect($data->all())->only(['display_name', 'description'])->toArray();
            $role->update($update_role);
        }
        $permissions = $this->storePermissions($data->permissions);
        $role->permissions()->detach();
        $role->permissions()->attach($permissions);
        return (new CommonIdResult($role->id));
    }

    /**
     * @param $permissions
     * @return array
     */
    public function storePermissions($permissions)
    {
        $permission_ids = [];
        foreach ($permissions as $permission) {
            $item = PermissionModel::updateOrCreate(['name' => $permission], ['name' => $permission]);
            $permission_ids[] = $item->id;
        }
        return $permission_ids;
    }

    /**
     * @param int $id
     * @return CommonResult
     * @throws OperationException
     */
    public function deleteRole(int $id): CommonResult
    {
        $item = RoleModel::query()->find($id);
        if (is_null($item)) {
            throw new OperationException(trans('errors.item_not_found'));
        }
        $item->detach();
        $item->delete();
        return new CommonResult();
    }

}
