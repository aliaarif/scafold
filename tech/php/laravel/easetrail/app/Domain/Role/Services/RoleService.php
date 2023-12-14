<?php

namespace App\Domain\Role\Services;

use App\Domain\Role\Repositories\RoleRepository;
use App\Domain\User\Repositories\UserRepository;

class RoleService
{
    private $roleRepository;
    private $userRepository;

    public function __construct() {
        $this->roleRepository = new RoleRepository();
        $this->userRepository = new UserRepository();
    }

    // public function updateUserRole($userId, $roleName) {
    //     $user = $this->userRepository->getUserById($userId);
    //     $user->roles()->detach();
    //     $role = $this->roleRepository->getRoleByName($roleName);
    //     $user->roles()->attach($role);
    //     $data = [
    //         'user' => $user,
    //         'role' => $user->roles->first()
    //     ];
    //     return $data;
    // }

}