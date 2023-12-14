<?php

namespace App\Domain\Business\Services;

use App\Domain\Business\Repositories\BusinessRepository;
// use Maatwebsite\Excel\Facades\Excel;

class ExportService
{
    private $businessRepository;

    public function __construct()
    {
        $this->businessRepository = new BusinessRepository();
    }
}