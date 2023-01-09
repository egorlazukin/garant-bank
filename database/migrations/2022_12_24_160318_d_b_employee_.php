<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DBEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		if (Schema::hasTable('employee_company') == false)
			Schema::create('employee_company', function (Blueprint $table) {
				$table->id();
				
				//------------------
				$table->bigInteger('id_users')->unsigned()->index()->nullable();
				$table->foreign('id_users')->references('id')->on('user_unik_id')->onDelete('cascade');
				$table->bigInteger('id_company')->unsigned()->index()->nullable();
				$table->foreign('id_company')->references('id')->on('company_unik_id')->onDelete('cascade');
				//------------------
				$table->timestamps();
			}); 
		if (Schema::hasTable('employee_title_job') == false)
			Schema::create('employee_title_job', function (Blueprint $table) {
				$table->id();
				$table->string('employee_title_job')->nullable();
				
				//------------------
				$table->bigInteger('id_employee_company')->unsigned()->index()->nullable();
				$table->foreign('id_employee_company')->references('id')->on('employee_company')->onDelete('cascade');
				//------------------
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
		Schema::dropIfExists('employee_title_job');
		Schema::dropIfExists('employee_company');
    }
}
