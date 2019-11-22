<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoorSetting extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'timer', 'open_time', 'close_time', 'village', 'min_chicken'
    ];

    public function user() {
		return $this->belongsTo("\App\User");
	}
}
