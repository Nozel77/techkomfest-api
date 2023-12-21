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
        Schema::table('detail_informatives', function (Blueprint $table) {
            $table->dropColumn('province');
            $table->dropColumn('history');
            $table->dropColumn('geography');
            $table->dropColumn('demographics');
            $table->dropColumn('artculture');
            $table->dropColumn('detail_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
