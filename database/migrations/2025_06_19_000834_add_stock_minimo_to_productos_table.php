<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 public function up()
{
    Schema::table('productos', function (Blueprint $table) {
        $table->integer('stock_minimo')->default(0)->after('cantidad');
    });
}

public function down()
{
    Schema::table('productos', function (Blueprint $table) {
        $table->dropColumn('stock_minimo');
    });
}
};
