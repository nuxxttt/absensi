<?php

namespace App\Imports;

use App\absen;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportCabang1 implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new absen([
            //
        ]);
    }
}
