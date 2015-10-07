<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'volunteers';

	/**
	 * The attributes that are mass assignable.d
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'role', 'cause', 'description', 'time_period', 'imageUri'];

}
