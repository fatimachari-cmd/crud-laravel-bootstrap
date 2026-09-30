<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('centres', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('centres');
        Schema::enableForeignKeyConstraints();
    }
};