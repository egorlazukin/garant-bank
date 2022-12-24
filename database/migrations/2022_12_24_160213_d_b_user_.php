<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DBUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		if (Schema::hasTable('user_unik_id') == false)
			Schema::create('user_unik_id', function (Blueprint $table) {
					$table->id();
			});    
		
		
		if (Schema::hasTable('hash_auth_private_key') == false)
			Schema::create('hash_auth_private_key', function (Blueprint $table) {
				$table->engine = 'MEMORY';
				$table->id();
				$table->bigInteger('id_users')->unsigned()->index()->nullable();
				$table->foreign('id_users')->references('id')->on('user_unik_id')->onDelete('cascade');
				$table->string('hash_login')->nullable();
				$table->timestamps();
			}); 
		
		if (Schema::hasTable('user_info') == false)
			Schema::create('user_info', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('id_users')->unsigned()->index()->nullable();
				$table->foreign('id_users')->references('id')->on('user_unik_id')->onDelete('cascade');
				$table->string('name')->nullable();
				$table->string('surname')->nullable();
				$table->timestamps();
			}); 
			
		if (Schema::hasTable('user_auth_save_info') == false)
			Schema::create('user_auth_save_info', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('id_users')->unsigned()->index()->nullable();
				$table->foreign('id_users')->references('id')->on('user_unik_id')->onDelete('cascade');
				$table->string('ip_auth')->nullable();
				$table->string('useragent')->nullable();
				$table->string('width')->nullable();
				$table->string('height')->nullable();
				$table->string('unik_id_browser')->nullable();
				$table->timestamps();
			}); 
			
		if (Schema::hasTable('user_auth_info') == false)
			Schema::create('user_auth_info', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('id_users')->unsigned()->index()->nullable();
				$table->foreign('id_users')->references('id')->on('user_unik_id')->onDelete('cascade');
				$table->string('login')->nullable();
				$table->string('password')->nullable();
				$table->string('unik_id_browser')->nullable();
				$table->timestamps();
			}); 
			
		if (Schema::hasTable('user_arhive_password') == false)
			Schema::create('user_arhive_password', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('id_users')->unsigned()->index()->nullable();
				$table->foreign('id_users')->references('id')->on('user_unik_id')->onDelete('cascade');
				$table->string('old_password')->nullable();
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
		Schema::dropIfExists('hash_auth_private_key');
		Schema::dropIfExists('user_info');
		Schema::dropIfExists('user_auth_save_info');
		Schema::dropIfExists('user_auth_info');
		Schema::dropIfExists('user_arhive_password');
		Schema::dropIfExists('user_unik_id');
    }
}
