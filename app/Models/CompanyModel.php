<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CompanyModel extends Model
{
    use HasFactory;
	public static function get_info_company($name_company, $inn)
	{
		if(CompanyModel::WhereSuchCompany_V2($name_company, $inn))
		{
			//компания есть
			$status_company_array = json_decode(DB::table('company_info') -> select('status_company', 'id_company') ->where('name_company', '=', $name_company)-> where('inn_company', '=', $inn) ->get(), true)[0];
			$status_company = $status_company_array['status_company'];
			$id = $status_company_array['id_company'];
			$other_info_array = json_decode(DB::table('company_other_info') -> select('other_info') ->where('id_company', '=', $id) ->get(), true);
			if(!isset($other_info_array[0]['other_info']))
				$other_info = '';
			else
				$other_info = $other_info_array[0]['other_info'];
			return json_encode(["error"=>"200", "status_company" => $status_company, "other_info" => $other_info], JSON_UNESCAPED_UNICODE);
		}
		return json_encode(["error"=>"403", "message"=>"This company does not exist"]);
	}
	
	public static function SearsCompany($name_company, $limit)
	{
		return DB::table('company_info') -> select('id', 'name_company') ->where('name_company', 'like', '%' . $name_company . '%') ->limit($limit) ->get();
	}

	public static function get_info_company_id($id)
	{
		if(CompanyModel::WhereSuchCompany_V1($id))
		{
			//компания есть
			$status_company_array = json_decode(DB::table('company_info') -> select('status_company', 'name_company', 'inn_company') -> where('id_company', '=', $id) ->get(), true)[0];
			$other_info_array = json_decode(DB::table('company_other_info') -> select('other_info', 'photo_url') ->where('id_company', '=', $id) ->get(), true);
			
			if(!isset($other_info_array[0]['other_info']) || $other_info_array[0]['other_info'] == '')
				$other_info = '';
			else
				$other_info = $other_info_array[0]['other_info'];
			if(!isset($other_info_array[0]['photo_url']))
				$photo_url = 'https://серебро.рф/img/placeholder.png';
			else
				$photo_url = $other_info_array[0]['photo_url'];
			//GetUserVorker

			return json_encode(["error"=>"200", "status_company" => $status_company_array, "other_info" => $other_info, 'photo_url' => $photo_url, 'array_vorker'=>CompanyModel::GetVorkerUs($id)], JSON_UNESCAPED_UNICODE);
		}
		return json_encode(["error"=>"403", "message"=>"This company does not exist"]);
	}
	public static function GetVorkerUs($id)
	{
		$vorkerList = json_decode(DB::table('employee_company') -> select('id_users') -> where('id_company', '=', $id) ->get(), true);
	 	$value_new = [];
		foreach ($vorkerList as $key => $value) {
			$user_info_array = json_decode(DB::table('user_info') -> select('id', 'name') -> where('id_users', '=', $value) ->get(), true)[0];

			$employee_title_job = json_decode(DB::table('employee_title_job') -> select('employee_title_job') -> where('id_employee_company', '=', $user_info_array['id']) ->get(), true)[0]['employee_title_job'];

			$value_new[] = ["employee_title_job" => $employee_title_job, "user_name" => $user_info_array['name']];
		}

		return $value_new;
	}
	public static function CreateNewCompany($name_company, $inn)
	{
		if(CompanyModel::WhereSuchCompany($name_company, $inn))
		{
			return json_encode(["error"=>"403", "message"=>"This entry has already been created"]);
		}
		$inn = CompanyModel::filter_characters($inn);
		if(strlen($inn) == 12)
		{
			//это физ лицо
			$inserts_deal_unik_id = DB::table('company_unik_id')->insertGetId([]);
			return CompanyModel::Createindividual($name_company, $inn, $inserts_deal_unik_id);
		}
		elseif (strlen($inn) == 10)
		{
			$inserts_deal_unik_id = DB::table('company_unik_id')->insertGetId([]);
			return CompanyModel::CreateCompany($name_company, $inn, $inserts_deal_unik_id);
		}
		else
		{
			return json_encode(["error"=>"403", "message"=>"TIN was entered incorrectly"]);
		}
	}	
	function WhereSuchCompany($name_company, $inn)
	{
		if (DB::table('company_info') ->where('name_company', '=', $name_company) ->exists())
			return True;	//Запись существует
		elseif(DB::table('company_info')  ->exists())
			return True;	//Запись существует
		return False;
	}
	function WhereSuchCompany_V1($id)
	{
		return DB::table('company_info') ->where('id_company', '=', $id)->get();
	}
	function WhereSuchCompany_V2($name_company, $inn)
	{
		if (DB::table('company_info') ->where('name_company', '=', $name_company)-> where('inn_company', '=', $inn) ->exists())
			return True;	//Запись существует
		return False;
	}
	function filter_characters($str) {
		return implode('', array_filter(str_split($str), function($digit) {
			return (is_numeric($digit));
		}));
	}
	function CreateCompany($name_company, $inn, $inserts_deal_unik_id)
	{
		$inserts = DB::table('company_info')->insertGetId(
				[
					'id_company' => $inserts_deal_unik_id, 
					'name_company' => $name_company, 
					'inn_company' => $inn, 
					'status_company' => 'Компания', 
					'created_at' => date('Y-m-d H:i:s'), 
					'updated_at' => date('Y-m-d H:i:s'), 
				]
			);
		
		$arr[] = ["returnID"=>$inserts];
		return $arr;
	}
	function Createindividual($name_company, $inn, $inserts_deal_unik_id)
	{
		$inserts = DB::table('company_info')->insertGetId(
				[
					'id_company' => $inserts_deal_unik_id, 
					'name_company' => $name_company, 
					'inn_company' => $inn, 
					'status_company' => 'Физическое лицо', 
					'created_at' => date('Y-m-d H:i:s'), 
					'updated_at' => date('Y-m-d H:i:s'), 
				]
			);
		
		$arr = ["returnID"=>$inserts];
		return $arr;
	}

}
