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
        Schema::create('welcomes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_path');
            $table->text('hight_light');
            $table->text('description');
            $table->string('main_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('welcomes');
    }
};
