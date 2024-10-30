<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PengeluaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('pengeluarans')->insert([
                'nama_pengeluaran' => $faker->word,
                'jumlah_pengeluaran' => $faker->numberBetween(10000, 1000000),
                'tanggal_pengeluaran' => $faker->dateTimeBetween('2024-01-01', '2024-10-10')->format('Y-m-d'),
                'keterangan' => $faker->sentence,
                'foto_bukti_pengeluaran' => $faker->optional()->imageUrl(640, 480, 'business', true, 'Faker'),
            ]);
        }
    }
}