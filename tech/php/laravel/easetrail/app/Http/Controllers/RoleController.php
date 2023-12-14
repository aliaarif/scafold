<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Role\Interfaces\RoleInterface;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class RoleController extends Controller
{
    protected $roleInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(RoleInterface $roleInterface)
    {
        $this->roleInterface = $roleInterface;
    }

     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->roleInterface->getAllRoles();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        return $this->roleInterface->saveRoles($request);
    }

    /**
     * Display the specified resource by id.
     */
    public function show($id)
    {
        return $this->roleInterface->getRolesById($id);
    }

    /**
     * Display the specified resource by slug and id.
     */
    public function getRolesBySlug($slug)
    {
        return $this->roleInterface->getRolesBySlug($slug);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->roleInterface->updateRoles($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->roleInterface->deleteRoles($id);
    }
}