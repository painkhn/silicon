<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link');
            $table->timestamps();
        });
        DB::table('categories')->insert([
            ['name' => 'Слабые PC', 'link' => 'weak_pc'],
            ['name' => 'Средние PC', 'link' => 'medium_pc'],
            ['name' => 'Мощные PC', 'link' => 'powerful_pc'],
            ['name' => 'Кастомные PC', 'link' => 'custom_pc'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
