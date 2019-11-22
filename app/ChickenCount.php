<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChickenCount extends Model
{

	protected $table = "chicken_count";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'value'
    ];

    public function user() {
		return $this->belongsTo("\App\User");
	}
}
