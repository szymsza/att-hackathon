<?php

namespace App\Http\Controllers;

use App\PredatorBreach;
use Illuminate\Http\Request;

class PredatorBreachController extends Controller
{
	public function get() {
		$user = session("user");
		$breach = $user->predatorBreaches->sortByDesc("created_at")->first();
    	if (!$breach)
    		return json_encode([]);

    	$response = [
    		"date" => $breach->created_at->format("Y-m-d H:i:s"),
			"alerted" => $breach->alerted
		];

    	$breach->update(["alerted" => true]);

    	return json_encode($response);
	}

	public function set() {
		$user = session("user");
		$data = [
			"user_id" => $user->id,
			"alerted" => 0
		];

		return PredatorBreach::create($data);
	}
}
