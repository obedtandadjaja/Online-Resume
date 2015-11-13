<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feat extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'feats';

	/**
	 * The attributes that are mass assignable.d
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'occupation', 'issuer', 'description', 'time_period', 'imageUri', 'logo'];

	public function images()
    {
        return $this->belongsToMany(Image::class);
    }

}
