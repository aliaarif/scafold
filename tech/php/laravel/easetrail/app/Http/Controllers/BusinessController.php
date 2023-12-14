<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Business\Interfaces\BusinessInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BusinessController extends Controller
{
    protected $businessInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(BusinessInterface $businessInterface)
    {
        $this->businessInterface = $businessInterface;
    }

     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->businessInterface->getAllBusinesses();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->businessInterface->saveBusiness($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->businessInterface->getBusinessById($id);
    }

    /**
     * Display the specified resource by slug and id.
     */
    public function getBusinessBySlug($slug, $id)
    {
        return $this->businessInterface->getBusinessBySlug($slug, $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->businessInterface->updateBusiness($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->businessInterface->deleteBusiness($id);
    }
}