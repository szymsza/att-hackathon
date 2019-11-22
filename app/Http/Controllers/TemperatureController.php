<?php

namespace App\Http\Controllers;

use App\TemperatureData;
use App\TemperatureSetting;
use Illuminate\Http\Request;

class TemperatureController extends Controller {

	public function get() {
		$user = session("user");
		$temperature = $user->temperatureData->sortByDesc("created_at")->first();
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
			"value" => (int)$request->value
		];

		return TemperatureData::create($data);
	}

	public function getSettings() {
		$user = session("user");
		$setting = $user->temperatureSetting;
    	if (!$setting)
    		$data = [
    			"active" => 0,
				"min" => 0,
				"max" => 0
			];
    	else
    		$data = [
    			"active" => $setting->active,
				"min" => $setting->min,
				"max" => $setting->max
			];

    	return json_encode($data);
	}

	public function setSettings(Request $request) {
		$user = session("user");
		$data = [];

		foreach (["active", "min", "max"] as $item)
			if (isset($request[$item]))
				$data[$item] = $request[$item];

		return TemperatureSetting::updateOrCreate(
			["user_id" => $user->id],
			$data
		);
	}
}
