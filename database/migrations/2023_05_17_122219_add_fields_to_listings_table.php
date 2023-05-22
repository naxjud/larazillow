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
        Schema::table('listings', function (Blueprint $table) {
            $table->unsignedTinyInteger('beds')->nullable();
            $table->unsignedTinyInteger('baths')->nullable();
            $table->unsignedSmallInteger('area')->nullable();

            $table->tinyText('city')->nullable();
            $table->tinyText('code')->nullable();
            $table->tinyText('street')->nullable();
            $table->tinyText('street_nr')->nullable();

            $table->unsignedInteger('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('listings', function (Blueprint $table) {
        //     $table->dropColumn()
        // });

        //these Columns should be droped when a rollback accure
        Schema::dropColumns('listings', [
            'beds', 'baths', 'area', 'city', 'code', 'street', 'street_nr', 'price'
        ]);
    }
};
