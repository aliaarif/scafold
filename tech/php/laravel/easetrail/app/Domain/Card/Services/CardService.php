<?php

namespace App\Domain\Card\Services;

use App\Domain\Card\Repositories\CardRepository;

class CardService
{
    private $cardRepository;

    public function __construct()
    {
        $this->cardRepository = new CardRepository();
    }
}