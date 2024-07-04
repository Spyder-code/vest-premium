<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductBehavior;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'phone' => '6283857317946',
        ]);

        $p1 = Product::create([
            'name' => 'AKUN NETFLIX SHARING',
            'type' => 'Sharing',
            'price' => 25000,
            'description' => '1 Profile 1 User',
            'stock' => 200
        ]);
        $p2 = Product::create([
            'name' => 'AKUN NETFLIX PRIVATE',
            'type' => 'Private',
            'price' => 100000,
            'description' => '1 Akun 5 Profile',
            'stock' => 200
        ]);
        $data = [
            ['name'=>'1 Profile Private', 'product_id'=>$p1->id],
            ['name'=>'Bisa Request Nama Profile', 'product_id'=>$p1->id],
            ['name'=>'Bisa Request PIN 4 Digit', 'product_id'=>$p1->id],
            ['name'=>'Bisa Download Film', 'product_id'=>$p1->id],
            ['name'=>'Premium UHD 4K', 'product_id'=>$p1->id],
            ['name'=>'Support All Device', 'product_id'=>$p1->id],
            ['name'=>'Legal Sub Indo', 'product_id'=>$p1->id],
            ['name'=>'Berisi 5 Profile', 'product_id'=>$p2->id],
            ['name'=>'Bisa Ganti Password Akun', 'product_id'=>$p2->id],
            ['name'=>'Bisa Menambahkan PIN', 'product_id'=>$p2->id],
            ['name'=>'Bisa Download Film', 'product_id'=>$p2->id],
            ['name'=>'Premium UHD 4K', 'product_id'=>$p2->id],
            ['name'=>'Support All Device', 'product_id'=>$p2->id],
            ['name'=>'Legal Sub Indo', 'product_id'=>$p2->id],
        ];

        ProductBehavior::insert($data);
    }
}
