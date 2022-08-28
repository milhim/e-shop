<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                'title' => Str::random(10),
                'imageUrl' => 'https://images.squarespace-cdn.com/content/v1/548ec3bee4b068057bfb6db7/1555524366324-VWFSC5FC2C2D9IP7XCP7/image-asset.jpeg?format=1500w',
                'price' => random_int(1, 50),
                'quantity' => random_int(1, 5),

            ]);
    }
}
