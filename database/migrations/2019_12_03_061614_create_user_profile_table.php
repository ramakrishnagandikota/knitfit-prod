<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->nullable();	
			$table->longText('aboutme')->nullable();			
			$table->text('professional_skills')->nullable();
			$table->string('relationship',100)->nullable();			
			$table->text('address')->nullable();
			$table->integer('status')->unsigned()->default(1);	
			$table->integer('privacy')->unsigned()->default(1);	
			$table->text('As_a_knitter_i_am')->nullable();			
			$table->text('i_knit_for')->nullable();			
			$table->text('rate_yourself')->nullable();			
			$table->text('i_am_here_for')->nullable();
			$table->string('ipaddress',100)->nullable();		
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
        Schema::dropIfExists('user_profile');
    }
}
