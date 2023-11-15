<?php

namespace App\Exports;

use App\Models\Logbarang;
use Maatwebsite\Excel\Concerns\FromCollection;

class LogbarangExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Logbarang::all();
    }
}
