<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_measurements', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->nullable();						
			$table->string('m_title',100)->nullable();			
			$table->string('m_description',100)->nullable();			
			$table->string('first_name',100)->nullable();			
			$table->string('last_name',100)->nullable();			
			$table->string('email_address',100)->nullable();			
			$table->string('waist',100)->nullable();			
			$table->text('measurement_preference')->nullable();			
			$table->text('stitch_gauge')->nullable();			
			$table->text('row_gauge')->nullable();			
			$table->text('lower_edge_circumference')->nullable();			
			$table->text('lower_edge_to_under_arm')->nullable();			
			$table->text('bust')->nullable();			
			$table->text('neck_edge_to_shoulder')->nullable();			
			$table->text('wrist_circumference')->nullable();			
			$table->text('forearm_circumference')->nullable();			
			$table->text('upper_arm_circumference')->nullable();			
			$table->text('length_to_under_arm')->nullable();			
			$table->text('length_wrist_to_elbow')->nullable();			
			$table->text('lenght_elbow_to_under_arm')->nullable();			
			$table->text('armhole_depth')->nullable();			
			$table->text('ease')->nullable();			
			$table->text('waist_front')->nullable();			
			$table->text('bust_front')->nullable();			
			$table->text('bust_back')->nullable();			
			$table->text('waist_back')->nullable();			
			$table->text('waist_to_underarm')->nullable();			
			$table->text('arm_length_to_shoulder')->nullable();			
			$table->text('shoulder_to_shoulder')->nullable();			
			$table->text('neck_depth')->nullable();			
			$table->text('raglan_depth')->nullable();			
			$table->text('user_meas_image')->nullable();			
			$table->string('difficulty_level',200)->nullable();			
			$table->string('tools_needed',200)->nullable();			
			$table->string('hips',200)->nullable();			
			$table->string('shoulder_circumference',200)->nullable();			
			$table->string('neck_width',200)->nullable();
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
        Schema::dropIfExists('user_measurements');
    }
}
