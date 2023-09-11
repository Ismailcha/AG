<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('offre_name');
            $table->string('laboratoire')->nullable(false);
            $table->string('grossiste')->nullable();
            $table->date('date_start');
            $table->date('date_end');
            $table->foreignId('user_id')->constrained();
            $table->integer('escompte')->nullable();
            $table->integer('min_total')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
