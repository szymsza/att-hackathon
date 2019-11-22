<?php

namespace App\Http\Controllers;

use App\HumidityData;
use Illuminate\Http\Request;

class HumidityController extends Controller {

	public function get() {
		$user = session("user");
		$humidity = $user->humidity->sortByDesc("created_at")->first();
    	if (!$humidity)
    		return json_encode([]);
    	return json_encode([
    		"date" => $humidity->created_at->format("Y-m-d H:i:s"),
			"value" => $humidity->value
		]);
	}

	public function set(Request $request) {
		$user = session("user");
		$data = [
			"user_id" => $user->id,
			"value" => (int)$request->humidity
		];

		return HumidityData::create($data);
	}
}
