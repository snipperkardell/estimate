<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModuleEstimateReasign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        //--reasign
        Schema::create('esrsg', function (Blueprint $table){
            $table->unsignedBigInteger('esrsgcrsg');
            $table->unsignedBigInteger('esrsgcmtr');
            $table->unsignedBigInteger('esrsgcorr');

            $table->string('esrsgdetl', 250)->nullable();
            $table->unsignedDecimal('esrsgtmnt', 12, 4)->nullable();
            $table->decimal('esrsgcant', 10, 4)->nullable();

            $table->unsignedInteger('esrsgcusr')->nullable();
            $table->unsignedInteger('esrsgstte')->nullable();
            $table->timestamp('esrsgfcrd')->nullable();
            $table->timestamp('esrsgfupd')->nullable();
            $table->softDeletes('esrsgfdel');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

    }

}
