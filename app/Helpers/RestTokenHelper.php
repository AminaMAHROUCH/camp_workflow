<?php 

namespace App\Helpers;

use App\Participant;
use App\Responsible;
use App\GroupResponsible;
use App\WorkshopResponsible;
use Illuminate\Support\Facades\Crypt;

class RestTokenHelper
{
	public const AUTH_MODELS = [Participant::class, Responsible::class, GroupResponsible::class, WorkshopResponsible::class];

	public static function login($email, $password)
	{
		$authUser = null;
		foreach (static::AUTH_MODELS as $key => $model) {
			$user = $model::where('email', $email)->first();
			if($user && \Hash::check($password, $user->password)) {
				$authUser = $user;
				break;
			}
		}

		return $authUser;
	}

	public static function getUserFromToken($token)
	{
		try {
			$authUser = Crypt::decrypt($token);
			$user = ($authUser['model'])::find($authUser['id']);
			static::setAuthUser($user, $authUser['model']);
			return $user;
		} catch(Exception $ex) {
			return null;
		}
	}

	public static function setAuthUser($user, $role) 
	{
		session(['authUser' => ['user' => $user, 'model' => $role]]);
	}

	public static function getAuthUser() 
	{
		return session('authUser');
	}
}