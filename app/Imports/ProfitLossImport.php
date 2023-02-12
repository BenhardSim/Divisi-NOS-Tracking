<?php

namespace App\Imports;

use App\Models\profit_loss;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class ProfitLossImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *d
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $latestId = profit_loss::max('id') + 1;
        return new profit_loss([
            'id' => $latestId,
            'siteid' => $row['siteid'],
            'site_name' => $row['site_name'],
            'kabupaten' => $row['kabupaten'],
            'nop' => $row['nop'],
            'revenue' => $row['revenue'],
            'remark' => $row['remark'],
            'date'=> Carbon::createFromFormat('m/d/Y',$row['date'])->format('Y-m-d'),
        ]);
    }
}
