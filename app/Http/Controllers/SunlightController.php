<?php

namespace App\Http\Controllers;

use App\SunlightData;
use Illuminate\Http\Request;

class SunlightController extends Controller {

	public function get() {
		$user = session("user");
		$sunlight = $user->sunlightData->sortByDesc("created_at")->first();
    	if (!$sunlight)
    		return json_encode([]);
    	return json_encode([
    		"date" => $sunlight->created_at->format("Y-m-d H:i:s"),
			"value" => $sunlight->value
		]);
	}

	public function set(Request $request) {
		$user = session("user");
		$data = [
			"user_id" => $user->id,
			"value" => (int)$request->value
		];

		return SunlightData::create($data);
	}
}
