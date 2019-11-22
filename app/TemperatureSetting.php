<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemperatureSetting extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'active', 'min', 'max'
    ];

    public function user() {
		return $this->belongsTo("\App\User");
	}
}
