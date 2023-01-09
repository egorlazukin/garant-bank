<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DBCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		if (Schema::hasTable('company_unik_id') == false)
			Schema::create('company_unik_id', function (Blueprint $table) {
					$table->id();
			});  
		if (Schema::hasTable('company_info') == false)
			Schema::create('company_info', function (Blueprint $table) {
				$table->id();
				$table->string('status_company')->nullable();
				$table->string('name_company')->nullable();
				$table->string('inn_company')->nullable();
				$table->bigInteger('id_company')->unsigned()->index()->nullable()->unique();
				$table->foreign('id_company')->references('id')->on('company_unik_id')->onDelete('cascade');
				$table->timestamps();
			}); 
		if (Schema::hasTable('company_other_info') == false)
			Schema::create('company_other_info', function (Blueprint $table) {
				$table->id();
				$table->string('other_info')->nullable();
				$table->string('photo_url')->nullable();
				$table->bigInteger('id_company')->unsigned()->index()->nullable();
				$table->foreign('id_company')->references('id')->on('company_unik_id')->onDelete('cascade');
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
        //
		Schema::dropIfExists('company_info');
		Schema::dropIfExists('company_other_info');
		Schema::dropIfExists('company_unik_id');
    }
}
