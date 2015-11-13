<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'projects';

	/**
	 * The attributes that are mass assignable.d
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'occupation', 'description', 'team_members', 'imageUri', 'time_period', 'logo'];

	public function images()
    {
        return $this->belongsToMany(Image::class);
    }

}
