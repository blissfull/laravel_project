<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create services table
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique;      
            $table->timestamps();
            $table->softDeletes();        
        });

        //create pivot table to habdle many to many relationship
        Schema::create('projects_service', function (Blueprint $table) {
            $table->integer('projects_id');
            $table->integer('service_id');
            $table->primary(['projects_id', 'service_id']);  
            $table->timestamps();
            $table->softDeletes();  
        });

        //array of data containf differnt types of services
        $services_data = array(
            array('name'=>'Detailing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name'=>'Estimating', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name'=>'Design', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name'=>'Construction', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name'=>'Review', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name'=>'Inspection', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now())
        );
        //insert defualt data in services table
        

        DB::table('services')->insert($services_data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');

        Schema::dropIfExists('projects_service');
    }
}
