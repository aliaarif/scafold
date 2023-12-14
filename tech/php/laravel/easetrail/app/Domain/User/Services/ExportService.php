<?php

namespace App\Domain\User\Services;

use App\Domain\User\Repositories\UserRepository;
// use Maatwebsite\Excel\Facades\Excel;

class ExportService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }
}