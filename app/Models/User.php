<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DB;
class User extends Authenticatable
{
	public static function get_user_hash($login, $password)
	{
		$password_hash = DB::table('user_auth_info') ->select('id_users', 'password') -> where('login', '=', $login) ->get();
		
		if($password_hash == "[]")
			return json_encode(["error"=>"403", "message"=>"The entered username is not correct"]);	
		
		$id_users = json_decode($password_hash, true)[0]['id_users'];
		$password_hash = json_decode($password_hash, true)[0]['password'];
			
		if (password_verify($password, $password_hash)) {
			$guid = SecurityModels::generateHash_Auth($id_users);
			return json_encode(["error"=>"200", "message"=>"Successfully", "cookieID" => $guid[0]['guid']]);
		}
		else
		{
			return json_encode(["error"=>"403", "message"=>"The entered password is not correct"]);
		}
	}
	
	public static function get_user_hash_chek($hash)
	{
		
		$hash_chek = DB::table('hash_auth_private_key') ->select('id_users') -> where('hash_login', '=', $hash) ->get();
		
		if($hash_chek == "[]")
			return json_encode(["error"=>"403", "message"=>"The entered hash is not correct"]);
		
		return json_encode(['error'=>'200', 'message'=>'token_valide']);
		
	}
	
	public static function get_user_info($id)
	{
		
		$user_info = DB::table('user_info') ->select('name', 'surname') -> where('id_users', '=', $id) ->get();
		
		if($user_info == "[]")
			return json_encode(["error"=>"403", "message"=>"The entered id is not correct"]);
		
		return json_encode(['error'=>'200', 'message'=>$user_info[0]]);
		
	}
	
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
