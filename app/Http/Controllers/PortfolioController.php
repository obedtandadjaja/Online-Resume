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
            $professional_images = $professional->images;
            $professional->imageUri = $professional_images;
            $professional->logo = Image::find($professional->logo);
        }
        // dd(sizeof($professional->imageUri));

		$volunteers = Volunteer::all();
		foreach($volunteers as $volunteer)
        {
            $volunteer_images = $volunteer->images;
            $volunteer->imageUri = $volunteer_images;
            $volunteer->logo = Image::find($volunteer->logo);
        }

		$projects = Project::all();
		foreach($projects as $project)
        {
            $project_images = $project->images;
            $project->imageUri = $project_images;
            $project->logo = Image::find($project->logo);
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
