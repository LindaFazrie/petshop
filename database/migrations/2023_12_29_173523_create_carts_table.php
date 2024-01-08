<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
<<<<<<< HEAD
        Schema::table('transactions', function (Blueprint $table) {
=======
        Schema::create('transactions', function (Blueprint $table) {
>>>>>>> 34581357298fae32d99f1d5718db18ff1ef719a1
            $table->json('cart_items')->nullable();
        });
    }

    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('cart_items');
        });
    }
};
