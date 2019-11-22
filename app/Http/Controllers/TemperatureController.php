<?php

namespace App\Http\Controllers;

use App\TemperatureData;
use Illuminate\Http\Request;

class TemperatureController extends Controller {

	public function get() {
		$user = session("user");
		$temperature = $user->temperature->sortByDesc("created_at")->first();
    	if (!$temperature)
    		return json_encode([]);
    	return json_encode([
    		"date" => $temperature->created_at->format("Y-m-d H:i:s"),
			"value" => $temperature->value
		]);
	}

	public function set(Request $request) {
		$user = session("user");
		$data = [
			"user_id" => $user->id,
			"value" => (int)$request->temperature
		];

		return TemperatureData::create($data);
	}
}
