<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('walis', function (Blueprint $table) {
            $table->unsignedBigInteger('mahasiswa_id')->after('pekerjaan');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('walis', function (Blueprint $table) {
            $table->dropForeign('mahasiswa_id');
        });
    }
};