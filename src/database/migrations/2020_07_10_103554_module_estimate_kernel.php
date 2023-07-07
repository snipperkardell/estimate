<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModuleEstimateKernel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
    /*
        //--master
        Schema::create('esmtr', function (Blueprint $table){
            $table->unsignedBigInteger('esmtrcorr')->unique();
            $table->string('esmtrcprt', 30)->nullable();
            $table->string('esmtrdetl', 250)->nullable();

            $table->string('esmtrnsrc', 50)->nullable();
            $table->unsignedInteger('esmtrcsrc')->nullable();

            $table->year('esmtrinig')->nullable();
            $table->year('esmtrendg')->nullable();
            $table->string('esmtrnges', 30)->nullable();
            $table->unsignedInteger('esmtrcges')->nullable();

            $table->string('esmtrncat', 50)->nullable();
            $table->unsignedInteger('esmtrccat')->nullable();

            $table->string('esmtrnung', 50)->nullable();
            $table->unsignedInteger('esmtrcung')->nullable();

            $table->string('esmtrnapp', 100)->nullable();
            $table->unsignedInteger('esmtrcapp')->nullable();

            $table->string('esmtrncct', 100)->nullable();
            $table->unsignedInteger('esmtrccct')->nullable();

            $table->string('esmtrnuni', 50)->nullable();
            $table->unsignedInteger('esmtrcuni')->nullable();

            $table->string('esmtrnare', 100)->nullable();
            $table->unsignedInteger('esmtrcare')->nullable();

            $table->string('esmtrnsar', 100)->nullable();
            $table->unsignedInteger('esmtrcsar')->nullable();

            $table->string('esmtrnfrc', 50)->nullable();
            $table->unsignedInteger('esmtrcfrc')->nullable();

            $table->unsignedDecimal('esmtrtmnt', 12, 4)->nullable();
            $table->decimal('esmtrcant', 10, 4)->nullable();

            $table->string('esmtrnmon', 30)->nullable();
            $table->string('esmtramon', 5)->nullable();
            $table->unsignedDecimal('esmtrtcam', 12, 4)->nullable();
            $table->unsignedInteger('esmtrcmon')->nullable();

            $table->unsignedInteger('esmtrcusr')->nullable();
            $table->unsignedInteger('esmtrstte')->nullable();
            $table->timestamp('esmtrfcrd')->nullable();
            $table->timestamp('esmtrfupd')->nullable();
            $table->softDeletes('esmtrfdel');
        });

        //--operativo
        Schema::create('esopr', function (Blueprint $table){
            $table->unsignedBigInteger('esoprcmtr')->unique();
            $table->string('esoprcprt', 30)->nullable();
            $table->string('esoprdetl', 250)->nullable();
            $table->unsignedDecimal('esoprtmnt', 12, 4)->nullable();
            $table->decimal('esoprcant', 10, 4)->nullable();

            $table->string('esoprncat', 50)->nullable();
            $table->unsignedInteger('esoprccat')->nullable();

            $table->string('esoprnmon', 30)->nullable();
            $table->string('esopramon', 5)->nullable();
            $table->unsignedDecimal('esoprtcam', 12, 4)->nullable();
            $table->unsignedInteger('esoprcmon')->nullable();

            $table->unsignedInteger('esoprcusr')->nullable();
            $table->unsignedInteger('esoprstte')->nullable();
            $table->timestamp('esoprfcrd')->nullable();
            $table->timestamp('esoprfupd')->nullable();
            $table->softDeletes('esoprfdel');
        });

        //--production
        Schema::create('esprd', function (Blueprint $table){
            $table->unsignedBigInteger('esprdcmtr')->unique();
            $table->string('esprdcprt', 30)->nullable();
            $table->string('esprddetl', 250)->nullable();
            $table->unsignedDecimal('esprdtmnt', 12, 4)->nullable();
            $table->decimal('esprdcant', 10, 4)->nullable();

            $table->string('esprdncat', 50)->nullable();
            $table->unsignedInteger('esprdccat')->nullable();

            $table->string('esprdnmon', 30)->nullable();
            $table->string('esprdamon', 5)->nullable();
            $table->unsignedDecimal('esprdtcam', 12, 4)->nullable();
            $table->unsignedInteger('esprdcmon')->nullable();

            $table->unsignedInteger('esprdcusr')->nullable();
            $table->unsignedInteger('esprdstte')->nullable();
            $table->timestamp('esprdfcrd')->nullable();
            $table->timestamp('esprdfupd')->nullable();
            $table->softDeletes('esprdfdel');
        });

        //--inversion
        Schema::create('esinv', function (Blueprint $table){
            $table->unsignedBigInteger('esinvcmtr')->unique();
            $table->string('esinvcprt', 30)->nullable();
            $table->string('esinvdetl', 250)->nullable();
            $table->unsignedDecimal('esinvtmnt', 12, 4)->nullable();
            $table->decimal('esinvcant', 10, 4)->nullable();

            $table->string('esinvncat', 50)->nullable();
            $table->unsignedInteger('esinvccat')->nullable();

            $table->string('esinvnmon', 30)->nullable();
            $table->string('esinvamon', 5)->nullable();
            $table->unsignedDecimal('esinvtcam', 12, 4)->nullable();
            $table->unsignedInteger('esinvcmon')->nullable();

            $table->string('esinvnpry', 255)->nullable();
            $table->unsignedInteger('esinvcpry')->nullable();
            $table->string('esinvnact', 255)->nullable();
            $table->unsignedInteger('esinvcact')->nullable();
            $table->string('esinvntsk', 255)->nullable();
            $table->unsignedInteger('esinvctsk')->nullable();

            $table->unsignedInteger('esinvcusr')->nullable();
            $table->unsignedInteger('esinvstte')->nullable();
            $table->timestamp('esinvfcrd')->nullable();
            $table->timestamp('esinvfupd')->nullable();
            $table->softDeletes('esinvfdel');
        });

        //--detalle
        Schema::create('esdtl', function (Blueprint $table){
            $table->unsignedBigInteger('esdtlcmtr');
            $table->unsignedBigInteger('esdtlcorr');
            $table->string('esdtlcprt', 30)->nullable();
            $table->string('esdtldetl', 250)->nullable();
            $table->unsignedDecimal('esdtltmnt', 12, 4)->nullable();
            $table->decimal('esdtlcant', 10, 4)->nullable();

            $table->string('esdtlncat', 50)->nullable();
            $table->unsignedInteger('esdtlccat')->nullable();

            $table->string('esdtlnmon', 30)->nullable();
            $table->string('esdtlamon', 5)->nullable();
            $table->unsignedDecimal('esdtltcam', 12, 4)->nullable();
            $table->unsignedInteger('esdtlcmon')->nullable();

            $table->string('esdtlnmth', 30)->nullable();
            $table->unsignedInteger('esdtlcmth')->nullable();

            $table->unsignedInteger('esdtlcusr')->nullable();
            $table->unsignedInteger('esdtlstte')->nullable();
            $table->timestamp('esdtlfcrd')->nullable();
            $table->timestamp('esdtlfupd')->nullable();
            $table->softDeletes('esdtlfdel');
        });

        //--area
        Schema::create('esare', function (Blueprint $table){
            $table->unsignedBigInteger('esarecorr');
            $table->string('esaredetl', 100)->nullable();

            $table->unsignedInteger('esareprnt')->nullable();
            $table->unsignedInteger('esareleft')->default(0);
            $table->unsignedInteger('esarerght')->default(0);

            $table->unsignedInteger('esarecusr')->nullable();
            $table->unsignedInteger('esarestte')->nullable();
            $table->timestamp('esarefcrd')->nullable();
            $table->timestamp('esarefupd')->nullable();
            $table->softDeletes('esarefdel');
        });

        //--concepto
        Schema::create('escon', function (Blueprint $table){
            $table->unsignedBigInteger('esconpref');
            $table->unsignedBigInteger('esconcorr');
            $table->string('escondetl', 100)->nullable();
            $table->string('esconabre', 10)->nullable();
            $table->unsignedBigInteger('esconorde')->nullable();

            $table->unsignedInteger('esconcusr')->nullable();
            $table->unsignedInteger('esconstte')->nullable();
            $table->timestamp('esconfcrd')->nullable();
            $table->timestamp('esconfupd')->nullable();
            $table->softDeletes('esconfdel');
            $table->unique(['esconpref', 'esconcorr']);
        });

        //--gestion
        Schema::create('esges', function (Blueprint $table){
            $table->unsignedBigInteger('esgescorr');
            $table->string('escondetl', 20)->nullable();
            $table->year('esgesinig')->nullable();
            $table->year('esgesendg')->nullable();

            $table->unsignedInteger('esgescusr')->nullable();
            $table->unsignedInteger('esgesstte')->nullable();
            $table->timestamp('esgesfcrd')->nullable();
            $table->timestamp('esgesfupd')->nullable();
            $table->softDeletes('esgesfdel');
        });

        //--exchange
        Schema::create('esexc', function (Blueprint $table){
            $table->unsignedBigInteger('esexccorr');
            $table->string('esexcdetl', 20)->nullable();
            $table->string('esexcabre', 10)->nullable();

            $table->unsignedDecimal('esexctcam', 12, 4)->nullable();
            $table->boolean('esexcactv')->nullable();

            $table->unsignedInteger('esexccusr')->nullable();
            $table->unsignedInteger('esexcstte')->nullable();
            $table->timestamp('esexcfcrd')->nullable();
            $table->timestamp('esexcfupd')->nullable();
            $table->softDeletes('esexcfdel');
        });*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

    }

}
