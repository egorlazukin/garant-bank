<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($login, $password)
    {
		return \App\Models\User::get_user_hash($login, $password);
    }
	
    public function index_hash($hash)
    {
		return \App\Models\User::get_user_hash_chek($hash);
    }
	
    public function Api_CheckPassword(Request $request)
    {
		if($request['name'] == "" || $request['password'] == "")
		{
			return json_encode(["error"=>"403", "message"=>"Not all fields entered"]);
		}
		$cookie = UserController::index($request['name'], $request['password']);
		if($cookie == null)
			return json_encode(["error"=>"403", "message"=>"User is not found"]);
		else
			return $cookie;
    }
	
    public function Api_CheckHash(Request $request)
    {
		if($request['hash'] == "")
		{
			return json_encode(["error"=>"403", "message"=>"Not all fields entered"]);
		}
		$cookie = UserController::index_hash($request['hash']);
		if($cookie == null)
			return json_encode(["error"=>"403", "message"=>"User is not found"]);
		else
			return $cookie;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_user_info($id)
    {
        if($id == "")
		{
			return json_encode(["error"=>"403", "message"=>"Not all fields entered"]);
		}
		$user_info = \App\Models\User::get_user_info($id);
		if($user_info == null)
			return json_encode(["error"=>"403", "message"=>"User is not found"]);
		else
			return $user_info;
    }
	
    public function get_user_all($limit, $offset)
    {
        if($limit == "")
		{
			return json_encode(["error"=>"403", "message"=>"Not all fields entered"]);
		}
		$user_info = \App\Models\User::get_user_list($limit, $offset);
		if($user_info == null)
			return json_encode(["error"=>"403", "message"=>"Users is not found"]);
		else
			return $user_info;
    }

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
