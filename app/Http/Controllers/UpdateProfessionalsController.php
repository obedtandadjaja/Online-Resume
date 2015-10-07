<?php namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Redirect;
use App\Professional;
use App\Http\Requests;
use App\Image;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;

class UpdateProfessionalsController extends Controller {

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
		$professionals = Professional::all();
        $images = Image::all();
		foreach($professionals as $professional)
        {
            $imageUri = $professional->imageUri;
            $image_array = explode(',', $imageUri);
            array_pop($image_array);
            
            $professional_images = array();
            foreach($image_array as $image_id)
            {
                array_push($professional_images, Image::find($image_id));
            }

            $professional->imageUri = $professional_images;
        }

		return view('professionals.index', compact('professionals', 'images'));
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

		Professional::create($input);

		return redirect('update_professionals');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$professional = Professional::findOrFail($id);
        $images = Image::all();
        $imageUri = $professional->imageUri;
        $image_array = explode(',', $imageUri);
        array_pop($image_array);
        
        $professional_images = array();
        foreach($image_array as $image_id)
        {
            array_push($professional_images, Image::find($image_id));
        }

        $professional->imageUri = $professional_images;

		return view('professionals.show', compact('professional', 'images'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$professional = Professional::findOrFail($id);
		$professional->name = Request::get('name');
		$professional->position_title = Request::get('position_title');
		$professional->location = Request::get('location');
		$professional->time_period = Request::get('time_period');
		$professional->description = Request::get('description');
        $professional->imageUri = Request::get('imageUri');
		$professional->save();

		return Redirect::to('update_professionals')->with('success', 'edit success');
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
		$professional = Professional::findOrFail($id);
		$professional->delete();

		return Redirect::to('update_professionals')->with('success', 'delete success');
	}

}

