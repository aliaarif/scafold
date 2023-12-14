<?php

namespace App\Domain\Address\Services;

use App\Domain\Address\Repositories\AddressRepository;
// use Maatwebsite\Excel\Facades\Excel;

class ExportService
{
    private $addressRepository;

    public function __construct()
    {
        $this->addressRepository = new AddressRepository();
    }
}