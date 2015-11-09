<?php namespace App\Http\Controllers;

use Request;
use App\Image;
use Illuminate\Support\Facades\Redirect;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

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
            $project_images = $project->images;
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
		$input = Input::all();
		$project = Project::create($input);
		$imageUri = Input::get('imageUri');
		$image_array = explode(',', $imageUri);
		array_pop($image_array);
		foreach($image_array as $image_id)
		{
			$exists = $project->images->contains($image_id);
        	if(!$exists)
        	{
        		$project->images()->attach($image_id);
        	}
		}
		foreach(Input::file('image') as $file)
        {
        	if($file)
        	{
        		if($file->isValid())
	            {
	                $destinationPath = public_path() . '/uploads/'; // upload path
	                $fileName = $file->getClientOriginalName(); // renameing image
	                $file->move($destinationPath, $fileName); // uploading file to given path

	                $image = Image::create([
	                    "title" => Input::input('title'),
	                    "description" => Input::input('image_description'),
	                    "location" => '../../uploads/' . $fileName
	                ]);

	                $project->images()->attach($image->id);
	            }
	            else
	            {
	                return Redirect::to('image')->with('success', 'upload not successful');
	                break;
	            }
        	}
        }

		return redirect('update_projects')->with('success', 'add successful');
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
        $imageUri = $project->images->lists('id');
        $imageUri = implode(",", $imageUri) . ",";
        $project_images = $project->images;

		return view('projects.show', compact('project', 'images', 'imageUri', 'project_images'));
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
		$imageUri = Request::get('imageUri');
        $imageUri = explode(",", $imageUri);
        array_pop($imageUri);
        foreach($project->images as $image)
        {
        	$project->images()->detach($image->id);
        }
        foreach($imageUri as $image_id)
        {
        	$exists = $project->images->contains($image_id);
        	if(!$exists)
        	{
        		$project->images()->attach($image_id);
        	}
        }
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
