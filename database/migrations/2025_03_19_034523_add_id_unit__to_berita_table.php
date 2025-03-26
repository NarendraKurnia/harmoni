<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->unsignedBigInteger('id_unit')->after('id'); // Sesuaikan dengan struktur tabel berita
            $table->foreign('id_unit')->references('id_unit')->on('units')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->dropForeign(['id_unit']);
            $table->dropColumn('id_unit');
        });
    }
};
