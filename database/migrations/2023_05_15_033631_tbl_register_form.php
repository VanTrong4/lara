<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblRegisterForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_registerForm', function (Blueprint $table) {
            $table->id();
            $table->string('idUser')->nullable();
            $table->string('preferContact')->nullable();
            $table->string('LINEID')->nullable();
            $table->string('postCodeBef')->nullable();
            $table->string('postCodeAfter')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('apartmentName')->nullable();
            $table->string('postCodeComBef')->nullable();
            $table->string('postCodeComAfter')->nullable();
            $table->string('districtCom')->nullable();
            $table->string('cityCom')->nullable();
            $table->string('addressCom')->nullable();
            $table->string('apartmentNameCom')->nullable();
            $table->string('telephoneCom')->nullable();
            $table->string('bankName')->nullable();
            $table->string('branchName')->nullable();
            $table->string('teleBranch')->nullable();
            $table->string('typeAccount')->nullable();
            $table->string('account')->nullable();
            $table->string('accountName')->nullable();
            $table->string('avatarUser')->nullable();
            $table->string('frontCardUser')->nullable();
            $table->string('afterCardUser')->nullable();
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
}
