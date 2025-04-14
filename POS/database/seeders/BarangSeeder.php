<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = [

            ['kategori_id' => 1, 'barang_kode' => 'B001', 'barang_nama' => 'TV Sumsang', 'harga_beli' => 3000000, 'harga_jual' => 4000000],
            ['kategori_id' => 1, 'barang_kode' => 'B002', 'barang_nama' => 'Laptop Asus', 'harga_beli' => 5000000, 'harga_jual' => 6000000],
            ['kategori_id' => 2, 'barang_kode' => 'B003', 'barang_nama' => 'Kaos', 'harga_beli' => 50000, 'harga_jual' => 60000],
            ['kategori_id' => 2, 'barang_kode' => 'B004', 'barang_nama' => 'Sepatu Sneakers', 'harga_beli' => 120000, 'harga_jual' => 150000],
            ['kategori_id' => 3, 'barang_kode' => 'B005', 'barang_nama' => 'Garam', 'harga_beli' => 3000, 'harga_jual' => 5000],
            ['kategori_id' => 3, 'barang_kode' => 'B006', 'barang_nama' => 'Gula', 'harga_beli' => 7000, 'harga_jual' => 10000],
            ['kategori_id' => 4, 'barang_kode' => 'B007', 'barang_nama' => 'Lego', 'harga_beli' => 500000, 'harga_jual' => 650000],
            ['kategori_id' => 4, 'barang_kode' => 'B008', 'barang_nama' => 'Mobil Remote', 'harga_beli' => 200000, 'harga_jual' => 350000],
            ['kategori_id' => 5, 'barang_kode' => 'B009', 'barang_nama' => 'Kursi Plastik', 'harga_beli' => 500000, 'harga_jual' => 650000],
            ['kategori_id' => 5, 'barang_kode' => 'B010', 'barang_nama' => 'Lampu Belajar', 'harga_beli' => 35000, 'harga_jual' => 40000]
        ];

        DB::table('m_barang')->insert($barang);
    }
}
