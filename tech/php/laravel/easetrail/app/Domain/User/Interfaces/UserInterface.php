<?php

namespace App\Domain\User\Interfaces;

use Illuminate\Http\Request;

interface UserInterface
{
    public function getAllUsers();
    public function getUserById($id);
    public function getUserBySlug($slug);
    public function saveUser(Request $request);
    public function updateUser(Request $request, $id);
    public function deleteUser($id);
}