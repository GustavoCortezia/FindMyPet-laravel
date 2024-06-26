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
        Schema::create('pets', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title');
            $table->string('animal', 20);
            $table->text('description');
            $table->string('found');
            $table->string('location')->nullable();
            $table->date('when')->nullable();
            $table->binary('image')->nullable();
            $table->mediumText('img')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
