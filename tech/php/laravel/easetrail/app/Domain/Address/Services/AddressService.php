<?php

namespace App\Domain\Address\Services;

use App\Domain\Address\Repositories\AddressRepository;

class AddressService
{
    private $addressRepository;

    public function __construct()
    {
        $this->addressRepository = new AddressRepository();
    }
}