<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\AbsenModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheet;


class InteractiveImport implements WithMultipleSheet
{
    /**
    * @param Collection $collection
    */
    public function sheets(): array
    {
        return [
            new AbsenModel,
        ];
    }
}
