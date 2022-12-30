<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
    public function getUserInfo($id, Request $request)
    {
		if($id == "")
		{
			return json_encode(["error"=>"403", "message"=>"Not all fields entered"]);
		}
		$userDealArray = \App\Models\DealModels::getUserInfo($id);
		if($userDealArray == null)
			return json_encode(["error"=>"403", "message"=>"User is not found"]);
		else
			return $userDealArray;
    }
	
    public function getAllDeal(Request $request)
    {
		if($request['hash']	== "")
		{
			return json_encode(["error"=>"403", "message"=>"Not all fields entered"]);
		}
		$userDealArray = \App\Models\DealModels::getListDeal($_GET['hash'], "0");
		if($userDealArray == null)
			return json_encode(["error"=>"403", "message"=>"User is not found"]);
		else
			return $userDealArray;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
