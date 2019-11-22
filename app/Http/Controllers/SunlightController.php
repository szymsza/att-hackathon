<?php

namespace App\Http\Controllers;

use App\SunlightData;
use Illuminate\Http\Request;

class SunlightController extends Controller {

	public function set(Request $request) {
		$user = session("user");
		$data = [
			"user_id" => $user->id,
			"value" => (int)$request->value
		];

		return SunlightData::create($data);
	}
}
