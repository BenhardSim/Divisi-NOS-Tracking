<?php

namespace App\Imports;

use App\Models\KPI_utama;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KPIImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new KPI_utama([
            'id' => $row['id'],
            'nop' => $row['nop'],
            'ach_kpi' => $row['ach_kpi'],
            'avail_all' => $row['avail_all'],
            'avail_power' => $row['avail_power'],
            'kpi_target' => $row['kpi_target'],
            // 'kpi_utama' => $row['kpi_utama'],
        ]);
    }
}
