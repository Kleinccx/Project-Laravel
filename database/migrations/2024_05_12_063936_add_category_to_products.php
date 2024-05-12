<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddCategoryToProducts extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('name');
            $table->timestamps();
        });

        $categories = [
            ['id' => 1, 'name' => 'Pants'],
            ['id' => 2, 'name' => 'Shirts'],
            ['id' => 3, 'name' => 'Longsleeves'],
            ['id' => 4, 'name' => 'Poloshirts'],
        ];

        foreach ($categories as $categoryData) {
            DB::table('categories')->insert($categoryData);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
}