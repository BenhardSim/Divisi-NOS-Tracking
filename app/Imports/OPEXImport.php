<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\OPEX;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OPEXImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $latestId = OPEX::max('id') + 1;
        return new OPEX([
            "id" => $latestId,
            "nop" => $row['funds_center'],
            "funds_center_desc" => $row['funds_center_description'],
            "commitmen_item" => $row['commitment_item'],
            "commitmen_item_desc" => $row['commitment_item_description'],
            "funds_area_desc" => $row['functional_area_description'],
            "absorption" => $row['consumable_amt_absorption'],
            "accure" => $row['consumable_amt_accure'],
            "available" => $row['available_amt'],
            'date'=> Carbon::createFromFormat('m/d/Y',$row['date'])->format('Y-m-d'),
            "kuartal" => "q1"
        ]);
    }
}
