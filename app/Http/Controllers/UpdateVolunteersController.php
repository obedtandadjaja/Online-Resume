<?php namespace App\Http\Controllers;

use Request;
use App\Image;
use Illuminate\Support\Facades\Redirect;
use App\Volunteer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
            $imageUri = $volunteer->imageUri;
            $image_array = explode(',', $imageUri);
            array_pop($image_array);
            
            $volunteer_images = array();
            foreach($image_array as $image_id)
            {
                array_push($volunteer_images, Image::find($image_id));
            }

            $volunteer->imageUri = $volunteer_images;
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

		Volunteer::create($input);

		return redirect('update_volunteers');
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
        $imageUri = $volunteer->imageUri;
        $image_array = explode(',', $imageUri);
        array_pop($image_array);
        
        $volunteer_images = array();
        foreach($image_array as $image_id)
        {
            array_push($volunteer_images, Image::find($image_id));
        }

        $volunteer->imageUri = $volunteer_images;

		return view('volunteers.show', compact('volunteer', 'images'));
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
