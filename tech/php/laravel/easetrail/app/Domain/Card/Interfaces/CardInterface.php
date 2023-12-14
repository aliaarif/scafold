<?php

namespace App\Domain\Card\Interfaces;

use Illuminate\Http\Request;

interface CardInterface
{
    public function getAllCards();
    public function getCardById($id);
    public function getCardBySlug($slug);
    public function saveCard(Request $request);
    public function updateCard(Request $request, $id);
    public function deleteCard($id);
}