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
	public function getListDeal()
	{
		
	}
}
