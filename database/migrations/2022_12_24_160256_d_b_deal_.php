<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DBDeal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (Schema::hasTable('deal_unik_id') == false)
			Schema::create('deal_unik_id', function (Blueprint $table) {
					$table->id();
			});  
			
		if (Schema::hasTable('deal_us_com') == false)
			Schema::create('deal_us_com', function (Blueprint $table) {
				$table->id();
				
				//------------------
				$table->bigInteger('id_users')->unsigned()->index()->nullable();
				$table->foreign('id_users')->references('id')->on('user_unik_id')->onDelete('cascade');
				$table->bigInteger('id_company')->unsigned()->index()->nullable();
				$table->foreign('id_company')->references('id')->on('company_unik_id')->onDelete('cascade');
				//------------------
				
				$table->bigInteger('id_deal')->unsigned()->index()->nullable();
				$table->foreign('id_deal')->references('id')->on('deal_unik_id')->onDelete('cascade');
				$table->timestamps();
			}); 
			
		if (Schema::hasTable('deal_status') == false)
			Schema::create('deal_status', function (Blueprint $table) {
				$table->id();
				$table->string('status_deal')->nullable();
				$table->bigInteger('id_deal')->unsigned()->index()->nullable();
				$table->foreign('id_deal')->references('id')->on('deal_unik_id')->onDelete('cascade');
				$table->timestamps();
			}); 
			
		if (Schema::hasTable('deal_info') == false)
			Schema::create('deal_info', function (Blueprint $table) {
				$table->id();
				$table->string('tz_info_deal')->nullable();
				$table->string('other_info_deal')->nullable();
				$table->bigInteger('id_deal')->unsigned()->index()->nullable();
				$table->foreign('id_deal')->references('id')->on('deal_unik_id')->onDelete('cascade');
				$table->timestamps();
			}); 
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('deal_us_com');
		Schema::dropIfExists('deal_status');
		Schema::dropIfExists('deal_info');
		Schema::dropIfExists('deal_unik_id');
    }
}
