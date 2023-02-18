<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\CostComponent;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CComponentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        $latestId = CostComponent::max('id') + 1;
        return new CostComponent([
            'id' => $latestId,
            'siteid' => $row['siteid'],
            'depre_bts' => $row['depre_bts'],
            'depre_tower_own' => $row['depre_tower_own'],
            'opex_isr' => $row['opex_isr'],
            'cost_nsr' => $row['cost_nsr'],
            'depre_combat' => $row['depre_combat'],
            'depre_power' => $row['depre_power'],
            'opex_transmission' => $row['opex_transmission'],
            'cost_tower' => $row['cost_tower'],
            'depre_uso' => $row['depre_uso'],
            'depre_sitesupport' => $row['depre_sitesupport'],
            'opex_power' => $row['opex_power'],
            'depre_accesslink' => $row['depre_accesslink'],
            'opex_frequency' => $row['opex_frequency'],
            'opex_rm' => $row['opex_rm'],
            'date'=> Carbon::createFromFormat('m/d/Y',$row['date'])->format('Y-m-d'),
        ]);
    }
}
