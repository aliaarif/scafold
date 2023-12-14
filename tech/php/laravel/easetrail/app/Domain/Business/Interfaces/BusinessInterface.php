<?php

namespace App\Domain\Business\Interfaces;

use Illuminate\Http\Request;

interface BusinessInterface
{
    public function getAllBusinesses();
    public function getBusinessById($id);
    public function getBusinessBySlug($slug, $id);
    public function saveBusiness(Request $request);
    public function updateBusiness(Request $request, $id);
    public function deleteBusiness($id);
}