<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('Furigana');
            $table->integer('year');
            $table->integer('month');
            $table->integer('day');
            $table->string('gender');
            $table->string('emailConfirm');
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
            $table->foreignId('current_team_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
