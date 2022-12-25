<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class SecurityModels extends Model
{
    use HasFactory;
	public static function generateHash_Auth($id_users)
	{
		$guid = SecurityModels::getGUID();
		$inserts = DB::table('hash_auth_private_key')->insert(
				[
					'id_users' => $id_users, 
					'hash_login' => $guid, 
					'created_at' => date('Y-m-d H:i:s'), 
					'updated_at' => date('Y-m-d H:i:s'), 
				]
			);
			$arr[] = ["return"=>$inserts, "guid"=>$guid];
		return $arr;
		
	}
	function getGUID(){
		if (function_exists('com_create_guid')){
			return com_create_guid();
		}
		else {
			mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
			$charid = strtoupper(md5(uniqid(rand(), true)));
			$hyphen = chr(45);// "-"
			$uuid = chr(123)// "{"
				.substr($charid, 0, 8).$hyphen
				.substr($charid, 8, 4).$hyphen
				.substr($charid,12, 4).$hyphen
				.substr($charid,16, 4).$hyphen
				.substr($charid,20,12)
				.chr(125);// "}"
			return $uuid;
		}
	}

}
