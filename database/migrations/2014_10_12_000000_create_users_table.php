<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name',200)->nullable();
            $table->string('first_name',255)->nullable();
            $table->string('last_name',100)->nullable();
            $table->text('username')->nullable();
            $table->text('location')->nullable();
            $table->integer('role')->unsigned()->default(2);
            $table->integer('type')->unsigned()->default(1);
            $table->string('email',255)->nullable();
            $table->string('password',255)->nullable();
            $table->text('enc_email')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->string('gender',50)->nullable();
            $table->date('dob')->nullable();
            $table->text('address')->nullable();
            $table->string('landmark',100)->nullable();
            $table->string('country',50)->nullable();
            $table->string('state',50)->nullable();
            $table->string('postcode',50)->nullable();
            $table->string('oauth_provider',50)->nullable();
            $table->string('oauth_uid',100)->nullable();
            $table->string('oauth_picture',100)->nullable();
            $table->string('locale',100)->nullable();
            $table->text('picture')->nullable();
            $table->text('picture_orginal')->nullable();
            $table->text('link')->nullable();
            $table->integer('status')->unsigned()->default(0);
            $table->text('security_question')->nullable();
            $table->text('security_answer')->nullable();
            $table->text('normal_sa')->nullable();
            $table->integer('login_attempts')->unsigned()->default(0);
            $table->date('sub_exp')->nullable();
            //$table->string('remember_token',100)->nullable();
            $table->integer('Inactiveusers_count')->unsigned()->default(0);
			$table->text('banner_orginal')->nullable();
			$table->text('banner')->nullable();
            $table->rememberToken();
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
