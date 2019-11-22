<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PredatorBreach extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'alerted'
    ];

    public function user() {
		return $this->belongsTo("\App\User");
	}
}
