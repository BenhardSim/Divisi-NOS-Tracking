<?php

namespace App\Imports;

use App\Models\KPI_utama;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class KPIImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    // function changeModel($date){
    //     return Carbon::createFromFormat('m/d/Y', $date)->format('Y-m-d');
    // }

    public function model(array $row)
    {
        $latestId = KPI_utama::max('id') + 1;
        return new KPI_utama([
            'id' => $latestId,
            'nop' => $row['nop'],
            'ach_kpi' => $row['ach_kpi'],
            'avail_all' => $row['avail_all'],
            'avail_power' => $row['avail_power'],
            'kpi_target' => $row['kpi_target'],
            'date'=> Carbon::createFromFormat('m/d/Y',$row['date'])->format('Y-m-d'),
            'kpi_utama' => $row['kpi_utama'],
        ]);
    }
}
