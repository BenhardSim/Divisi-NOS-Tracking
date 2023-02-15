<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\BBM;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BBMImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $latestId = BBM::max('id') + 1;
        return new BBM([
            "id" => $latestId,
            "siteid" => $row['siteid'],
            "site_name" => $row['site_name'],
            "site_category" => $row['site_category'],
            "nop" => $row['nop'],
            "genset" => $row['genset'],
            "harga_rata" => $row['harga_rata'],
            "cluster" => $row['cluster'],
            "rh" => $row['rh'],
            "harga_total" => $row['harga_total'],
            'date'=> Carbon::createFromFormat('m/d/Y',$row['date'])->format('Y-m-d'),
            "bbm" => $row['bbm'],
        ]);
    }
}
