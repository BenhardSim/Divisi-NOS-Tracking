<?php

namespace App\Imports;
use Carbon\Carbon;
use App\Models\infraIrr;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InfraImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $latestId = infraIrr::max('id') + 1;
        return new infraIrr([
            'id' => $latestId,
            'nop' => $row['nop'],
            'condition_1' => $row['condition_1'],
            'condition_2' => $row['condition_2'],
            'condition_3' => $row['condition_3'],
            'condition_4' => $row['condition_4'],
            'condition_5' => $row['condition_5'],
            'condition_6' => $row['condition_6'],
            'condition_7' => $row['condition_7'],
            'condition_8' => $row['condition_8'],
            'condition_9' => $row['condition_9'],
            'condition_10' => $row['condition_10'],
            'condition_11' => $row['condition_11'],
            'date'=> Carbon::createFromFormat('m/d/Y',$row['date'])->format('Y-m-d'),
            'owner' => $row['owner'],
        ]);
    }
}
