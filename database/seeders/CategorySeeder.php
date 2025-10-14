<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            [
                'name' => 'Pembayaran',
            ],
            [
                'name' => 'Pesanan',
            ],
            [
                'name' => 'Komplain Pesanan',
            ],
            [
                'name' => 'Pengembalian Dana',
            ],
            [
                'name' => 'Bantuan Teknis',
            ],
            [
                "name" => 'Layanan Produk'
            ],
        ]);
    }
}
