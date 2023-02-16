<?php

namespace App\Imports;

use App\Models\tren_irr;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IRRImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $latestId = tren_irr::max('id') + 1;
        return new tren_irr([
            'id' => $latestId,
            'b2s' => $row['b2s'],
            'collo_tp' => $row['collo_tp'],
            'target_irr_collo' => $row['target_irr_collo'],
            'target_irr_b2s' => $row['target_irr_b2s'],
            'komitmen_collo' => $row['komitmen_collo'],
            'komitmen_b2s' => $row['komitmen_b2s'],
            'periode' => $row['periode'],
            'nop' => $row['nop'],
        ]);
    }
}
