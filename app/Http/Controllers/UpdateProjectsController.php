<?php namespace App\Http\Controllers;

use Request;
use App\Image;
use Illuminate\Support\Facades\Redirect;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;

class UpdateProjectsController extends Controller {

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
		$projects = Project::latest()->get();
        $images = Image::all();
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

		return view('projects.index', compact('projects', 'images'));
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
		$input = Request::all();

		Project::create($input);

		return redirect('update_projects');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$project = Project::findOrFail($id);
        $images = Image::all();
        $imageUri = $project->imageUri;
        $image_array = explode(',', $imageUri);
        array_pop($image_array);
        
        $project_images = array();
        foreach($image_array as $image_id)
        {
            array_push($project_images, Image::find($image_id));
        }

        $project->imageUri = $project_images;

		return view('projects.show', compact('project', 'images'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = Project::findOrFail($id);
		$project->name = Request::get('name');
		$project->occupation = Request::get('occupation');
		$project->team_members = Request::get('team_members');
		$project->time_period = Request::get('time_period');
		$project->description = Request::get('description');
        $project->imageUri = Request::get('imageUri');
		$project->save();

		return Redirect::to('update_projects')->with('success', 'edit success');
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
		$project = Project::findOrFail($id);
		$project->delete();

		return Redirect::to('update_projects')->with('success', 'delete success');
	}

}
