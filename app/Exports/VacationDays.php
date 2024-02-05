<?php

namespace App\Exports;

use App\Models\Solicitudes_vacaciones;
use Maatwebsite\Excel\Concerns\FromCollection;

class VacationDays implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Solicitudes_vacaciones::all();
    }
}
