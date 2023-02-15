<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\RVC;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RVCImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $latestId = RVC::max('id') + 1;
        return new RVC([
            "id" =>  $latestId,
            "siteid" => $row['siteid'],
            "nop" => $row['nop'],
            "site_name" => $row['site_name'],
            "traffic" => $row['traffic'],
            "payload" => $row['payload'],
            "revenue" => $row['revenue'],
            'date'=> Carbon::createFromFormat('m/d/Y',$row['date'])->format('Y-m-d'),
            "cost" => $row['cost'],
        ]);
    }
}
