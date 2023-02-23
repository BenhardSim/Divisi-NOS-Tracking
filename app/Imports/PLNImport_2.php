<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\pln;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PLNImport_2 implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $latestId = pln::max('id') + 1;
        return new pln([
            "id" => $latestId,
            "siteid" => $row['siteid'],
            "sitename" => $row['sitename'],
            "idpel" => $row['idpel'],
            "tarif" => $row['tarif'],
            "daya" => $row['daya'],
            "statusdaya" => $row['statusdaya'],
            "faktorkali" => $row['faktorkali'],
            "standawal" => $row['standawal'],
            "standakhir" => $row['standakhir'],
            "pemakaianreal" => $row['pemakaianreal'],
            "jmltagihan" => $row['jmltagihan'],
            'date'=> Carbon::createFromFormat('m/d/Y',$row['date'])->format('Y-m-d'),
        ]);
    }
}
