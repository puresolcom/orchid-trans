<?php
namespace App\Services\User;

use App\Repositories\UserRepositoryEloquent;
use App\Services\BaseService;

class RegisterUserService extends BaseService
{
    protected $userRepo;

    public function __construct(UserRepositoryEloquent $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    public function __invoke($attributes)
    {
        if (isset($attributes['password'])) {
            $attributes['password'] = \Hash::make($attributes['password']);
        }

        if (isset($attributes['role'])) {
            $roleId = $attributes['role'];
            unset($attributes['role']);
        }

        $user = $this->userRepo->create($attributes);

        if (isset($roleId)) {
            $user->roles()->attach($roleId);
        }
    }
}
