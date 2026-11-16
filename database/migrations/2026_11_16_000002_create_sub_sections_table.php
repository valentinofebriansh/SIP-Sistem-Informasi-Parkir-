<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sub_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parking_area_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->integer('total_slots');
            $table->integer('available_slots');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sub_sections');
    }
};
