<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $products = [
            // Cake Category
            [
                'name' => 'Caramel/Sarang Semut Cake',
                'description' => 'Kue caramel dengan tekstur lembut seperti sarang semut.',
                'category_id' => 1,
                'price' => 50000,
                'stock' => 'Tersedia',
                'image' => 'caramel_sarang_semut.jpg'
            ],
            [
                'name' => 'Rainbow Cake',
                'description' => 'Kue warna-warni yang lembut dengan lapisan krim manis.',
                'category_id' => 1,
                'price' => 50000,
                'stock' => 'Tersedia',
                'image' => 'rainbow_cake.jpg'
            ],
            [
                'name' => 'Tiramisu Cake',
                'description' => 'Kue lembut dengan rasa kopi khas Italia dan krim keju.',
                'category_id' => 1,
                'price' => 60000,
                'stock' => 'Tersedia',
                'image' => 'tiramisu_cake.jpg'
            ],
            [
                'name' => 'Brownies Cake',
                'description' => 'Kue brownies lembut dengan rasa coklat yang kaya.',
                'category_id' => 1,
                'price' => 70000,
                'stock' => 'Tersedia',
                'image' => 'brownies_cake.jpg'
            ],
            [
                'name' => 'Ketan Hitam Kukus',
                'description' => 'Kue ketan hitam kukus dengan tekstur lembut.',
                'category_id' => 1,
                'price' => 55000,
                'stock' => 'Tersedia',
                'image' => 'ketan_hitam_kukus.jpg'
            ],
            [
                'name' => 'Mandarin Cake',
                'description' => 'Kue dengan rasa mandarin yang segar dan manis.',
                'category_id' => 1,
                'price' => 50000,
                'stock' => 'Tersedia',
                'image' => 'mandarin_cake.jpg'
            ],
            [
                'name' => 'Black Forest',
                'description' => 'Kue black forest dengan lapisan cokelat dan krim segar.',
                'category_id' => 1,
                'price' => 75000,
                'stock' => 'Tersedia',
                'image' => 'black_forest.jpg'
            ],
            [
                'name' => 'Red Velvet',
                'description' => 'Kue red velvet dengan lapisan krim keju yang lembut.',
                'category_id' => 1,
                'price' => 60000,
                'stock' => 'Tersedia',
                'image' => 'red_velvet.jpg'
            ],

            // Catering Category
            [
                'name' => 'Paket Nasi Ayam Bakar',
                'description' => 'Nasi box lengkap dengan lauk telur, ayam bakar, perkedel, dan sayur.',
                'category_id' => 3,
                'price' => 20000,
                'stock' => 'Tersedia',
                'image' => 'nasi_box_paket.jpg'
            ],
            [
                'name' => 'Paket Nasi Rames',
                'description' => 'Nasi rames lengkap dengan lauk telur, ayam goreng, perkedel, dan sayur.',
                'category_id' => 3,
                'price' => 25000,
                'stock' => 'Tersedia',
                'image' => 'nasi_rames_paket.jpg'
            ],
            [
                'name' => 'Paket Nasi Kuning',
                'description' => 'Nasi kuning lengkap dengan lauk telur, kering tempe, ayam goreng, perkedel, dan mie goreng.',
                'category_id' => 3,
                'price' => 25000,
                'stock' => 'Tersedia',
                'image' => 'nasi_kuning.jpg'
            ],
            [
                'name' => 'Paket Nasi Uduk',
                'description' => 'Nasi uduk dengan telur, kering tempe, ayam goreng, dan bihun goreng.',
                'category_id' => 3,
                'price' => 20000,
                'stock' => 'Tersedia',
                'image' => 'nasi_uduk_paket.jpg'
            ],

            // Snack Category
            [
                'name' => 'Sosis Ayam',
                'description' => 'Sosis ayam dengan tekstur lembut dan gurih.',
                'category_id' => 2,
                'price' => 1500,
                'stock' => 'Tersedia',
                'image' => 'sosis.jpg'
            ],
            [
                'name' => 'Sosis Basah',
                'description' => 'Sosis basah dengan tekstur lembut dan rasa gurih.',
                'category_id' => 2,
                'price' => 1500,
                'stock' => 'Tersedia',
                'image' => 'sosis_basah.jpg'
            ],
            [
                'name' => 'Risol Mayo',
                'description' => 'Risol berisi mayones dan daging asap yang gurih.',
                'category_id' => 2,
                'price' => 2000,
                'stock' => 'Tersedia',
                'image' => 'risol.jpg'
            ],
            [
                'name' => 'Arem-arem',
                'description' => 'Nasi dengan isian ayam yang dibungkus daun pisang.',
                'category_id' => 2,
                'price' => 2000,
                'stock' => 'Tersedia',
                'image' => 'arem_arem.jpg'
            ],
            // [
            //     'name' => 'Semar Mendem',
            //     'description' => 'Lemper khas dengan isian ayam dan ketan yang lezat.',
            //     'category_id' => 2,
            //     'price' => 2500,
            //     'stock' => 'Tersedia',
            //     'image' => 'semar_mendem.jpg'
            // ],
            // [
            //     'name' => 'Bolu Kukus Gula Merah',
            //     'description' => 'Bolu kukus manis dengan rasa gula merah.',
            //     'category_id' => 3,
            //     'price' => 2000,
            //     'stock' => 'Tersedia',
            //     'image' => 'bolu_kukus_gula_merah.jpg'
            // ],
            // [
            //     'name' => 'Dadar gulung',
            //     'description' => 'Dadar gulung manis dengan isian kelapa.',
            //     'category_id' => 3,
            //     'price' => 3000,
            //     'stock' => 'Tersedia',
            //     'image' => 'dadar_gulung.jpg'
            // ],
            // [
            //     'name' => 'Kue Lumpur',
            //     'description' => 'Kue lumpur manis dengan tekstur lembut.',
            //     'category_id' => 3,
            //     'price' => 2000,
            //     'stock' => 'Tersedia',
            //     'image' => 'kue_lumpur.jpg'
            // ],
        ];

        foreach ($products as $product) {
            Products::create($product);
        }
    }
}
