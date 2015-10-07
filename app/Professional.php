<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'professionals';

	/**
	 * The attributes that are mass assignable.d
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'description', 'time_period', 'position_title', 'location', 'imageUri'];

}
