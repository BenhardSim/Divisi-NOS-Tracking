<?php

namespace App\Imports;

use App\Models\KPI_support;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class KPISupportImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row 
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $latestId = KPI_support::max('id') + 1;
        return new KPI_support([
            'id' => $latestId,
            'nop' => $row['nop'],
            'ach_kpi' => $row['ach_kpi'],
            'avail_all' => $row['avail_all'],
            'avail_power' => $row['avail_power'],
            'kpi_target' => $row['kpi_target'],
            'date'=> Carbon::createFromFormat('m/d/Y',$row['date'])->format('Y-m-d'),
            'kpi_support' => $row['kpi_support'],
        ]);
    }
}
