<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            $table->foreignId('developer_id');
            $table->string('name', 256);
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->integer('year');
            $table->string('image', 256)->nullable();
            $table->boolean('display');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
