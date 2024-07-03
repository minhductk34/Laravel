<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('listings')) {
            Schema::create('listings', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('beds');
                $table->unsignedBigInteger('baths');
                $table->unsignedSmallInteger('area');
                $table->tinyText('city');
                $table->tinyText('code');
                $table->tinyText('street');
                $table->tinyText('street_nr');
                $table->unsignedBigInteger('price');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::table('listings', function (Buleprint $table){
//            $table->dropColumn();
//        });
        Schema::dropIfExists('listings');
    }

};
