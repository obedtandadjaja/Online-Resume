<?php namespace App\Http\Controllers;

use Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Input;
use Auth;
use App\Image;

// use Illuminate\Http\Request;

class UpdateBioController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Find ME!
		$user = User::find(1);
        $images = Image::all();
    	$user_images = $user->images;
    	$user->imageUri = $user_images;

		return view('bio.index', compact('user', 'images'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
        $images = Image::all();

		return view('bio.show', compact('user', 'images'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $input = Input::all();

		$user = user::findOrFail($id);
		$user->age = Request::get('age');
		$user->religion = Request::get('religion');
		$user->degree = Request::get('degree');
		$user->nationality = Request::get('nationality');
		$user->ethnicity = Request::get('ethnicity');
		$user->language = Request::get('language');
		$user->summary = Request::get('summary');
        $user->focus = Request::get('focus');
        $user->occupation = Request::get('occupation');
        $user->imageUri = Request::get('imageUri');
        $imageUri = Request::get('imageUri');
        $imageUri = explode(",", $imageUri);
        array_pop($imageUri);
        foreach($imageUri as $image_id)
        {
        	$exists = $user->images->contains($image_id);
        	if(!$exists)
        	{
        		$user->images()->attach($image_id);
        	}
        }
		$user->save();

		return redirect('update_bio');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
