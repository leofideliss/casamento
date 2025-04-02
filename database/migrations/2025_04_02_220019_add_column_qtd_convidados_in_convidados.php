<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnQtdConvidadosInConvidados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('convidados', function (Blueprint $table) {
            $table->integer("qtd_convidados")->default(0);
            $table->integer('status')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('convidados', function (Blueprint $table) {
            $table->dropColumn("qtd_convidados");
              $table->boolean("status")->default(0)->change();
        });
    }
}
