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
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unique();
            $table->text('name')->nullable();
            $table->enum('type', ['forestry', 'environmental_crime', 'wildlife'])->default('wildlife');
            $table->text('address')->nullable();
            $table->text('address_2')->nullable();
            $table->text('phone')->nullable();
            $table->text('branch')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
