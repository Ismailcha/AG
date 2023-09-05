<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganismesTable extends Migration
{
    public function up()
    {
        Schema::create('organismes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->enum('type', [1, 2])->comment('1: laboratoire, 2: grossiste');
            $table->string('adress');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('ICE');
            $table->string('Potent');
            $table->string('RC');
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organismes');
    }
}
