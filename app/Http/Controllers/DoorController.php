<?php

namespace App\Http\Controllers;

use App\DoorSetting;
use Illuminate\Http\Request;

class DoorController extends Controller
{
    public function getSettings() {
		$user = session("user");
		$setting = $user->doorSetting;
    	if (!$setting)
    		$data = [
    			'timer' => 0,
				'open_time' => '7:00',
				'close_time' => '18:00',
				'village' => 'Brno',
				'min_chicken' => 0
			];
    	else
    		$data = [
    			'timer' => $setting->timer,
				'open_time' => $setting->open_time,
				'close_time' => $setting->close_time,
				'village' => $setting->village,
				'min_chicken' => $setting->min_chicken
			];

    	return json_encode($data);
	}

	public function setSettings(Request $request) {
		$user = session("user");
		$data = [];

		foreach (['timer', 'open_time', 'close_time', 'village', 'min_chicken'] as $item)
			if (isset($request[$item]))
				$data[$item] = $request[$item];

		return DoorSetting::updateOrCreate(
			["user_id" => $user->id],
			$data
		);
	}
}
