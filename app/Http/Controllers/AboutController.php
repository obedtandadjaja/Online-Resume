<?php namespace App\Http\Controllers;

use App\User;
use App\Feat;
use App\Activity;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;

use Illuminate\Http\Request;

class AboutController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = User::find(1);
        $user->imageUri = $user->images;

		$feats = Feat::all();
        foreach($feats as $feat)
        {
        	$feat->imageUri = $feat->images;
        }

		$activities = Activity::all();

        $images = Image::all();

        // dd($user);

		return view('about', compact('user', 'feats', 'activities', 'images'));
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
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
