<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodigoToProductosTable extends Migration
{
public function up()
{
    Schema::table('productos', function (Blueprint $table) {
        $table->string('codigo', 20)->nullable()->after('id'); // 👈 Cambia "descripcion" por "id"
    });
}

    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn('codigo');
        });
    }
}
