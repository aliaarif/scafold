<?php 

namespace App\Domain\Role\Interfaces;

use Illuminate\Http\Request;

interface RoleInterface
{
    public function getAllRoles();
    public function getRoleById($id);
    public function getRoleBySlug($slug);
    public function saveRole($request);
    public function updateRole($request, $id);
    public function deleteRole($id);
}