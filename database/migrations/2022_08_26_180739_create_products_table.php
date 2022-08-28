<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('imageUrl');
            $table->integer('price');
            $table->integer('quantity');
            $table->timestamps();
        });

        Product::create([
            'title' => Str::random(10),
            'imageUrl' => 'https://images.squarespace-cdn.com/content/v1/548ec3bee4b068057bfb6db7/1555524366324-VWFSC5FC2C2D9IP7XCP7/image-asset.jpeg?format=1500w',
            'price' => random_int(1, 50),
            'quantity' => random_int(1, 5),
]);

        Product::create([
            'title' => Str::random(10),
            'imageUrl' => 'https://images.squarespace-cdn.com/content/v1/548ec3bee4b068057bfb6db7/1555524366324-VWFSC5FC2C2D9IP7XCP7/image-asset.jpeg?format=1500w',
            'price' => random_int(1, 50),
            'quantity' => random_int(1, 5),
]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
