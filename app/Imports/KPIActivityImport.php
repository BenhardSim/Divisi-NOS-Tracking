<?php

namespace App\Imports;

use App\Models\KPI_aktif;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class KPIActivityImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row 
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new KPI_aktif([
            'id' => $row['id'],
            'nop' => $row['nop'],
            'ach_kpi' => $row['ach_kpi'],
            'avail_all' => $row['avail_all'],
            'avail_power' => $row['avail_power'],
            'kpi_target' => $row['kpi_target'],
            'date'=> Carbon::createFromFormat('m/d/Y',$row['date'])->format('Y-m-d'),
            'kpi_activity' => $row['kpi_activity'],
        ]);
    }
}
