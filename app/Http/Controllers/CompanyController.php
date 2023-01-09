<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\CompanyModel;
class CompanyController extends Controller
{
	public function CreateNewCompany(Request $request)
	{
		if($request['name_company'] == '' || $request['inn_company'] == '')
		{
			return json_encode(["error"=>"403", "message"=>"Not all fields entered"]);
		}
		
		return CompanyModel::CreateNewCompany($request['name_company'], $request['inn_company']);
	}
	public function get_info_company(Request $request)
	{
		if($request['name_company'] == '' || $request['inn_company'] == '')
		{
			return json_encode(["error"=>"403", "message"=>"Not all fields entered"]);
		}
		
		return CompanyModel::get_info_company($request['name_company'], $request['inn_company']);
	}
	public function get_info_company_id($get_info_company_id)
	{
		
		return CompanyModel::get_info_company_id($get_info_company_id);
	}
	public function SearsCompany(Request $request)
	{
		if($request['name_company'] == "")
		{
			return ["error"=>"500"];
		}
		$limit = 20;
		$arr = CompanyModel::SearsCompany($request['name_company'], $limit);
		if (!isset($arr)) {
			return ["error"=>"500"];

		}
		return ["error"=>"200", "return"=> $arr];
	}

}
