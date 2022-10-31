<?php

namespace App\Http\Controllers\Admin;

use App\DataObjects\Auth\AuthData;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Requests\Admin\Auth\LoginRequest;
use App\Services\UserService;

class AuthController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * AuthController constructor.
     * @param UserService $user_service
     */
    public function __construct(UserService $user_service)
    {
        $this->userService = $user_service;
    }

    public function showLogin()
    {
        return view('admin.login');
    }

    public function loginForAdmin(LoginRequest $request)
    {
        $data = AuthData::createFromRequest($request);
        $action_result = $this->userService->checkUserAuth($data, true);
        if ($action_result->success) {
            if ($this->guard()->attempt($data->all())) {
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        } else {
            return redirect()->back()->withErrors($action_result->error);
        }
        return redirect()->back()->withErrors(trans('all.error_auth_failed'));
    }

    public function logout()
    {
        $this->guard()->logout();
        return redirect()->route('admin.login');
    }

    protected function guard()
    {
        return auth()->guard('admin');
    }
}
