<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('institutional_information', function (Blueprint $table) {
            $table->id();
            $table->text('history')->nullable();
            $table->string('history_image')->nullable();
            $table->string('history_title')->default('Historia');
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->text('values')->nullable();
            $table->text('objectives')->nullable();
            $table->string('education_level')->nullable();
            $table->text('general_info')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('institutional_information');
    }
};
