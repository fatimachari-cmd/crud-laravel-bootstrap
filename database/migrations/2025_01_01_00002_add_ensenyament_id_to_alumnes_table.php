<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('alumnes', function (Blueprint $table) {
            $table->unsignedBigInteger('ensenyament_id')->nullable()->after('centre_id');
            $table->foreign('ensenyament_id')->references('id')->on('ensenyaments');
        });
    }

    public function down()
    {
        Schema::table('alumnes', function (Blueprint $table) {
            $table->dropForeign(['ensenyament_id']);
            $table->dropColumn('ensenyament_id');
        });
    }
};