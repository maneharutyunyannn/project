<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users_lists', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['admin','moderator']);
            $table->string('name');
            $table->integer('age');
            $table->integer('phone');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_lists');
    }
};
