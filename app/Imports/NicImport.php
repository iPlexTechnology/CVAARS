<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NicImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        //
    }
}
