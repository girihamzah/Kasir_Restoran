<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 10; $i++) {
            Transaksi::insert([
                'nama_pelanggan' => $faker->firstName(),
                'menu_id' => $faker->numberBetween(1, 11),
                'jumlah' => $faker->numberBetween(1, 8),
                'total_harga' => $faker->numberBetween(7, 180) * 1000,
                'pegawai_id' => $faker->randomElement([1]),
                'created_at' => now()->subDays('6'),
                'updated_at' => now()->subDays('6'),
            ]);
        };
        for($i = 1; $i <= 6; $i++) {
            Transaksi::insert([
                'nama_pelanggan' => $faker->firstName(),
                'menu_id' => $faker->numberBetween(1, 11),
                'jumlah' => $faker->numberBetween(1, 8),
                'total_harga' => $faker->numberBetween(7, 180) * 1000,
                'pegawai_id' => $faker->randomElement([1]),
                'created_at' => now()->subDays('5'),
                'updated_at' => now()->subDays('5'),
            ]);
        };
        for($i = 1; $i <= 8; $i++) {
            Transaksi::insert([
                'nama_pelanggan' => $faker->firstName(),
                'menu_id' => $faker->numberBetween(1, 11),
                'jumlah' => $faker->numberBetween(1, 8),
                'total_harga' => $faker->numberBetween(7, 180) * 1000,
                'pegawai_id' => $faker->randomElement([1]),
                'created_at' => now()->subDays('4'),
                'updated_at' => now()->subDays('4'),
            ]);
        };
        for($i = 1; $i <= 4; $i++) {
            Transaksi::insert([
                'nama_pelanggan' => $faker->firstName(),
                'menu_id' => $faker->numberBetween(1, 11),
                'jumlah' => $faker->numberBetween(1, 8),
                'total_harga' => $faker->numberBetween(7, 180) * 1000,
                'pegawai_id' => $faker->randomElement([1]),
                'created_at' => now()->subDays('3'),
                'updated_at' => now()->subDays('3'),
            ]);
        };
        for($i = 1; $i <= 9; $i++) {
            Transaksi::insert([
                'nama_pelanggan' => $faker->firstName(),
                'menu_id' => $faker->numberBetween(1, 11),
                'jumlah' => $faker->numberBetween(1, 8),
                'total_harga' => $faker->numberBetween(7, 180) * 1000,
                'pegawai_id' => $faker->randomElement([1]),
                'created_at' => now()->subDays('2'),
                'updated_at' => now()->subDays('2'),
            ]);
        };
        for($i = 1; $i <= 12; $i++) {
            Transaksi::insert([
                'nama_pelanggan' => $faker->firstName(),
                'menu_id' => $faker->numberBetween(1, 11),
                'jumlah' => $faker->numberBetween(1, 8),
                'total_harga' => $faker->numberBetween(7, 180) * 1000,
                'pegawai_id' => $faker->randomElement([1]),
                'created_at' => now()->subDays('1'),
                'updated_at' => now()->subDays('1'),
            ]);
        };
        for($i = 1; $i <= 25; $i++) {
            Transaksi::insert([
                'nama_pelanggan' => $faker->firstName(),
                'menu_id' => $faker->numberBetween(1, 11),
                'jumlah' => $faker->numberBetween(1, 8),
                'total_harga' => $faker->numberBetween(7, 180) * 1000,
                'pegawai_id' => $faker->randomElement([1]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        };
    }
}
