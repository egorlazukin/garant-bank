<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class DealModels extends Model
{
    use HasFactory;
	public function getUserInfo($id)
    {
		$deal_all = DB::table('deal_us_com') -> where('id_users', '=', $id) -> count();
		
		$deal_status_done = DB::table('deal_us_com') -> where('id_users', '=', $id) -> join('deal_status', 'deal_status.id_deal', '=', 'deal_us_com.id_deal') -> 
			where('deal_status.status_deal', '=', 0)  -> count();
		
		$deal_status_expected = DB::table('deal_us_com') -> where('id_users', '=', $id) -> join('deal_status', 'deal_status.id_deal', '=', 'deal_us_com.id_deal') -> 
			where('deal_status.status_deal', '=', 1)  -> count();
			
		$deal_status_canceled = DB::table('deal_us_com') -> where('id_users', '=', $id) -> join('deal_status', 'deal_status.id_deal', '=', 'deal_us_com.id_deal') -> 
			where('deal_status.status_deal', '=', 2)  -> count();
			
		$deal_status_waiting = DB::table('deal_us_com') -> where('id_users', '=', $id) -> join('deal_status', 'deal_status.id_deal', '=', 'deal_us_com.id_deal') -> 
			where('deal_status.status_deal', '=', 3)  -> count();
			
		$deal_status_suspended = DB::table('deal_us_com') -> where('id_users', '=', $id) -> join('deal_status', 'deal_status.id_deal', '=', 'deal_us_com.id_deal') -> 
			where('deal_status.status_deal', '=', 4)  -> count();
			
		
		//if($hash_chek == "[]")
		//	return json_encode(["error"=>"403", "message"=>"The entered hash is not correct"]);
		return json_encode(['error'=>'200', 'message'=>'request successful', 
			"deal_all"=>$deal_all, 
			"deal_status_done" => $deal_status_done,
			"deal_status_expected" => $deal_status_expected,
			"deal_status_canceled" => $deal_status_canceled,
			"deal_status_waiting" => $deal_status_waiting,
			"deal_status_suspended" => $deal_status_suspended,
		]);
	}
	public function get_TypeDeal1($hash, $type)
	{
		$arr = json_decode(\App\Models\User::get_user_hash_chek($hash), true);
		if($arr['error'] == "403")
		{
			return json_encode(["error"=>'403', "message"=>"The entered hash is not correct"]);
		}
		$id = $arr['userID'];
		$deal_status_done = [];
		$deal_status_all = DB::table('deal_us_com') -> where('id_users', '=', $id) -> join('deal_status', 'deal_status.id_deal', '=', 'deal_us_com.id_deal') -> 
			where('deal_status.status_deal', '=', $type)  -> get();
		foreach ($deal_status_all as &$value) {
			$id_company = json_decode(json_encode($value), true)['id_company'];
			$deal_status_done[] = DB::table('company_info') -> 
			select('name_company', 'status_company') -> where('id_company', '=', $id_company) -> get()[0];
		}
		return json_encode(["error"=>'200', 'message'=>'request successful', "company"=>$deal_status_done], JSON_UNESCAPED_UNICODE);
	}
	public function getListDeal($hash, $type)
	{
		$arr = json_decode(\App\Models\User::get_user_hash_chek($hash), true);
		if($arr['error'] == "403")
		{
			return json_encode(["error"=>'403', "message"=>"The entered hash is not correct"]);
		}
		$id = $arr['userID'];
		if($type == "0")
		{
			$deal_status_done=[];
			$deal_status_all =  DB::table('deal_us_com') -> where('id_users', '=', $id) -> get();
			foreach ($deal_status_all as &$value) {
				$id_company = json_decode(json_encode($value), true)['id_company'];
				$deal_status_done[] = DB::table('company_info') -> 
				select('name_company', 'status_company') -> where('id_company', '=', $id_company) -> get()[0];
			}
			return json_encode(["error"=>'200', 'message'=>'request successful', "company"=>$deal_status_done], JSON_UNESCAPED_UNICODE);
		}
	}
}
