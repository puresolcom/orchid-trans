<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Services\User\RegisterUserService;
use Orchid\Platform\Models\Role;

class UserController extends Controller
{
    public function register(Role $role)
    {
        return view('users.register', ['roleName' => $role->name]);
    }

    /**
     * Store/Register User
     *
     * @param StoreUserRequest $request
     * @param RegisterUserService $registerUserService
     * @return void
     */
    public function store(StoreUserRequest $request, RegisterUserService $registerUserService)
    {
        try {
            $registerUserService($request->validated());
        } catch (\Throwable $e) {
            // Handle errors displaying here
        }
        return redirect()->route('platform.login')->with('message', 'User Registered Successfully');
    }
}
