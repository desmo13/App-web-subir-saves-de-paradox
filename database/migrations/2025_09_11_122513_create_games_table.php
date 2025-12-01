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
        Schema::create('games', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->foreignId('user_id')->constrained("users")->cascadeOnDelete();
            $table->foreignId('game_name_id')->constrained("game_names")->cascadeOnDelete();
            $table->string('title');
            $table->string('file_name')->nullable();
            $table->integer('number_of_Downloads')->default(0);
            $table->integer('favorite')->default(0);
            $table->string('path')->nullable();
            $table->string('description');
            $table->boolean('public');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
