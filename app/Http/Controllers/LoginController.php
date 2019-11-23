<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request) {
		$user = User::where([
			"email" => $request->email
		])->firstOrFail();

		if (!Hash::check($request->password, $user->password))
			abort(403);

		return json_encode([
			"token" => $user->app_token
		]);
	}
}
