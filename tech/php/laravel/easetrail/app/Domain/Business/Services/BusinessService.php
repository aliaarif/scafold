<?php

namespace App\Domain\Business\Services;

use App\Domain\Business\Repositories\BusinessRepository;

class BusinessService
{
    private $businessRepository;

    public function __construct()
    {
        $this->businessRepository = new BusinessRepository();
    }
}