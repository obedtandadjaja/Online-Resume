<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'images';

	/**
	 * The attributes that are mass assignable.d
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'description', 'location'];

    public function professionals()
    {
        return $this->belongsToMany(Professional::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function feats()
    {
        return $this->belongsToMany(Feat::class);
    }

    public function volunteers()
    {
        return $this->belongsToMany(Volunteer::class);
    }

}
