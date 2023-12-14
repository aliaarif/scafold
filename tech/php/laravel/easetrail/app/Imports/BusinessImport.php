<?php

namespace App\Imports;

use App\Models\Business;
use Maatwebsite\Excel\Concerns\ToModel;
use Ramsey\Uuid\Uuid;

class BusinessImport implements ToModel
{

    private function generateCustomUuid()
    {
        $datePart = now()->format('Ymd');
        $uuidPart = Uuid::uuid4()->toString();
        return $datePart . '-' . $uuidPart;
    }

    public function model(array $row)
    {
        return new Business([
            'bid' => $this->generateCustomUuid(),
            'business_name' => $row[0],
            'business_slug' => $row[1],
            // Add other fields as needed
        ]);
    }

    
}
