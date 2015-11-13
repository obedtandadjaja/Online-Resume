<?php namespace App\Http\Controllers;

use Request;
use App\Image;
use Illuminate\Support\Facades\Redirect;
use App\Volunteer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

// use Illuminate\Http\Request;

class UpdateVolunteersController extends Controller {

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
		$volunteers = Volunteer::all();
		$images = Image::all();
		foreach($volunteers as $volunteer)
        {
            $volunteer_images = $volunteer->images;
            $volunteer->imageUri = $volunteer_images;
            $volunteer->logo = Image::find($volunteer->logo);
        }

		return view('volunteers.index', compact('volunteers', 'images'));
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
		$volunteer = Volunteer::create($input);
		$imageUri = Input::get('imageUri');
		$image_array = explode(',', $imageUri);
		array_pop($image_array);
		foreach($image_array as $image_id)
		{
			$exists = $volunteer->images->contains($image_id);
        	if(!$exists)
        	{
        		$volunteer->images()->attach($image_id);
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

	                $volunteer->images()->attach($image->id);
	            }
	            else
	            {
	                return Redirect::to('image')->with('success', 'upload not successful');
	                break;
	            }
        	}
        }

		return redirect('update_volunteers')->with('success', 'add successful');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$volunteer = volunteer::findOrFail($id);
        $images = Image::all();
        $imageUri = $volunteer->images->lists('id');
        $imageUri = implode(",", $imageUri) . ",";
        $volunteer_images = $volunteer->images;

		return view('volunteers.show', compact('volunteer', 'images', 'imageUri', 'volunteer_images'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$volunteer = volunteer::findOrFail($id);
		$volunteer->name = Request::get('name');
		$volunteer->cause = Request::get('cause');
		$volunteer->role = Request::get('role');
		$volunteer->time_period = Request::get('time_period');
		$volunteer->description = Request::get('description');
        $volunteer->imageUri = Request::get('imageUri');
        $volunteer->logo = Request::get('logo');
		$imageUri = Request::get('imageUri');
        $imageUri = explode(",", $imageUri);
        array_pop($imageUri);
        foreach($volunteer->images as $image)
        {
        	$volunteer->images()->detach($image->id);
        }
        foreach($imageUri as $image_id)
        {
        	$exists = $volunteer->images->contains($image_id);
        	if(!$exists)
        	{
        		$volunteer->images()->attach($image_id);
        	}
        }
		$volunteer->save();

		return Redirect::to('update_volunteers')->with('success', 'edit success');
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
		$volunteer = volunteer::findOrFail($id);
		$volunteer->delete();

		return Redirect::to('update_volunteers')->with('success', 'delete success');
	}

}
