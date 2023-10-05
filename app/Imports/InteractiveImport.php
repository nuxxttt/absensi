<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\AbsenModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;



class InteractiveImport implements WithMultipleSheets
{
    /**
    * @param Collection $collection
    */
    public function sheets(): array
    {
        return [
            "Exception Stat."=> new InteractivesImport()
        ];
    }
}
