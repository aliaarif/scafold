<?php

namespace App\Domain\Card\Services;

use App\Domain\Card\Repositories\CardRepository;
// use Maatwebsite\Excel\Facades\Excel;

class ExportService
{
    private $cardRepository;

    public function __construct()
    {
        $this->cardRepository = new CardRepository();
    }
}