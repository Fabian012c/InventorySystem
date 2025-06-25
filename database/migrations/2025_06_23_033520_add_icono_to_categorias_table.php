<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('categorias', function (Blueprint $table) {
        $table->string('color', 20)->nullable()->after('nombre'); // agrega esto si quieres tener 'color'
        $table->string('icono')->nullable()->after('color');
    });
}

public function down()
{
    Schema::table('categorias', function (Blueprint $table) {
        $table->dropColumn('icono');
    });
}
};
