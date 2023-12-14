<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\User\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends Controller
{
    protected $userInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(userInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->userInterface->getAllUsers();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->userInterface->saveUsers($request);
    }

    /**
     * Display the specified resource by id.
     */
    public function show($id)
    {
        return $this->userInterface->getUsersById($id);
    }

    /**
     * Display the specified resource by slug and id.
     */
    public function getUsersBySlug($slug)
    {
        return $this->userInterface->getUsersBySlug($slug);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->userInterface->updateUsers($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->userInterface->deleteUsers($id);
    }
}