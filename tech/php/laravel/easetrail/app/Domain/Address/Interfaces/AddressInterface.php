<?php

namespace App\Domain\Address\Interfaces;

use Illuminate\Http\Request;

interface AddressInterface
{
    public function getAllAddresses();
    public function getAddressById($id);
    public function getAddressBySlug($slug);
    public function saveAddress(Request $request);
    public function updateAddress(Request $request, $id);
    public function deleteAddress($id);
}