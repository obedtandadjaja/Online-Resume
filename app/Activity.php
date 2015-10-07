<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'activities';

	/**
	 * The attributes that are mass assignable.d
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'description', 'time_period'];

}
