<?php

namespace App\Imports;

use App\Models\ReservedCost;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class ReservedCostImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ReservedCost([
            'id' => $row['id'],
            'date'=> Carbon::createFromFormat('m/d/Y',$row['date'])->format('Y-m-d'),
            'ticket_number' => $row['ticket_number'],
            'status' => $row['status'],
            'work_status' => $row['work_status'],
            'siteid' => $row['siteid'],
            'site_name' => $row['site_name'],
            'type' => $row['type'],
        ]);
    }
}
