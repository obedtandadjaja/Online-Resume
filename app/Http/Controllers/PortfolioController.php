<?php namespace App\Http\Controllers;

use App\Image;
use App\Professional;
use App\Volunteer;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PortfolioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$professionals = Professional::all();
        foreach($professionals as $professional)
        {
            $imageUri = $feat->imageUri;
            $image_array = explode(',', $imageUri);
            array_pop($image_array);
            
            $array_image = array();
            foreach($image_array as $image_id)
            {
                array_push($array_image, Image::find($image_id));
            }

            $professional->imageUri = $array_image;
        }

		$volunteers = Volunteer::all();
		foreach($volunteers as $volunteer)
        {
            $imageUri = $volunteer->imageUri;
            $image_array = explode(',', $imageUri);
            array_pop($image_array);
            
            $array_image = array();
            foreach($image_array as $image_id)
            {
                array_push($array_image, Image::find($image_id));
            }

            $volunteer->imageUri = $array_image;
        }

		$projects = Project::all();
		foreach($projects as $project)
        {
            $imageUri = $project->imageUri;
            $image_array = explode(',', $imageUri);
            array_pop($image_array);
            
            $project_images = array();
            foreach($image_array as $image_id)
            {
                array_push($project_images, Image::find($image_id));
            }

            $project->imageUri = $project_images;
        }

		return view('portfolio', compact('professionals', 'volunteers', 'projects'));
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
