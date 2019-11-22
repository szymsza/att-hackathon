<?php

namespace App\Http\Controllers;

use App\ChickenCount;
use App\ChickenEntry;
use Illuminate\Http\Request;

class ChickenCountController extends Controller
{
	public function get() {
		$user = session("user");
		$count = $user->chickenCount;
    	if (!$count)
    		$number = 0;
    	else
    		$number = $count->value;

    	return json_encode([
    		"date" => $count ? $count->updated_at->format("Y-m-d H:i:s") : null,
			"value" => $number
		]);
	}

    public function entry(Request $request) {
		$entered = (boolean)$request->entered;

		$user = session("user");

		// Update chicken count
		$count = $user->chickenCount;
		if ($count)
			$number = $count->value;
		else
			$number = 0;

		ChickenCount::updateOrCreate(
			["user_id" => $user->id],
			["value" => $entered ? ++$number : --$number]
		);

		// Create chicken entry
		$data = [
			"user_id" => $user->id,
			"entered" => $entered
		];
		return ChickenEntry::create($data);
	}
}
