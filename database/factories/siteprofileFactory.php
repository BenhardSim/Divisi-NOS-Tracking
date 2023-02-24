<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Stringable;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\siteprofile>
 */
class siteprofileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'SITEIDOLD' => $this->faker->regexify('[A-Z]{3}[0-9]{3}'),
            'SITEID' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'SITENAME' => $this->faker->city(),
            'ALAMAT' => $this->faker->address(),
            'KABUPATEN' => $this->faker->city(),
            'PROPINSI' => $this->faker->state(),
            'LONGITUDE' => $this->faker->randomFloat(1, 108, 112),
            'LATITUDE' => $this->faker->randomFloat(1, -6, -8),
            'TAHUNONAIR' => $this->faker->dateTimeBetween('-20 years', 'now'),
            'TYPESITE' => $this->faker->randomElement(['Green Field', 'Rooftop']),
            'TYPEBTN' => $this->faker->randomElement(['Macro', 'Micro']),
            'JENISTOWER' => $this->faker->randomElement(['SST', 'Guyed Mast', 'Pole', 'Cruiser Non Truck', 'Arrow', 'Mini CME', 'Comis Non Infra', 'Kamuflase']),
            'KETINGGIANTOWER' => $this->faker->numberBetween(10, 80),
            'TOWERSTATUS' => $this->faker->randomElement(['Sewa TP', 'Sewa Reseller', 'Beli Telkom', 'Beli Telkomsel']),
            'PEMILIKLAHAN' => $this->faker->name(),
            'PEMILIKTOWER' => $this->faker->randomElement(['Telkom', 'Telkomsel', 'Reseller', 'Mixue', 'Naskun Pasundan', 'Burjoni Sipodang']),
            'BIAYASEWATOWER' => $this->faker->numberBetween(1000000000, 2000000000),
            'UTILITIESITE' => $this->faker->randomElement(['TP', 'Non TP', 'Unknown']),
            'IMBSTATUS' => $this->faker->randomElement(['No Need', 'Valid', 'Unknown', 'Inovasi to DMT']),
            'NOIMBTOWER' => $this->faker->numberBetween(1, 1000),
            'NOSERTIFIKATLAHAN' => $this->faker->numberBetween(10, 1000),
            'NOKONTRAK' => $this->faker->regexify('PKS.[0-9]{3}/[A-Z]{2}[0-9]{2}/[A-Z]{2}[0-9]{2}/[0-9]{2}/[0-9]{4}'),
            'CONTACTPERSON' => $this->faker->name(),
            'NOHPCP' => $this->faker->phoneNumber(),
            'ALAMATCP' => $this->faker->address(),
            'AWALPERIODEKONTRAK' => $this->faker->dateTime(),
            'AKHIRPERIODEKONTRAK' => $this->faker->dateTime(),
            'LUASDIMENSILAHAN' => $this->faker->randomFloat(1, 100, 200),
            'JENISCATUANLISTRIK' => "PLN",
            'DAYALISTRIKTERPASANG' => $this->faker->numberBetween(5000, 60000),
            'SITESTATUS' => $this->faker->randomElement(['Active', 'Not Active']),
            'IDPEL' => $this->faker->regexify('[0-9]{12}'),
            'PAYMENTPLNMETODE' => $this->faker->randomElement(['Centralized', 'Listrik by TP', 'Include Sarpen']),
            'HO' => $this->faker->numberBetween(1, 200),
            'SITETSELBARU' => $this->faker->randomElement(['DONE', 'DONE_TP', 'Unknown']),
            'SITETSELSEWA' => $this->faker->randomElement(['NONEED', 'SEWA_TP', 'NONEED_TELKOM']),
            'MASABERLAKUIMB' => $this->faker->regexify('[0-9]{1} tahun'),
            'noHO' => $this->faker->numberBetween(1, 200),
            'MASABERLAKU' => $this->faker->regexify('[0-9]{1} tahun'),
            'status' => $this->faker->randomElement(['Sudah BAAK', 'Belum BAAK']),
        ];
    }
}
