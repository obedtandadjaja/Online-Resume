<?php namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Redirect;
use App\Professional;
use App\Http\Requests;
use App\Image;
use Input;
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
        	$professional_images = $professional->images;
        	$professional->imageUri = $professional_images;
        	$professional->logo = Image::find($professional->logo);
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
		$input = Input::all();

        // creates professional
		$professional = Professional::create($input);

		$imageUri = Input::get('imageUri');
		$image_array = explode(',', $imageUri);
        array_pop($image_array);
        foreach($image_array as $image_id)
        {
        	$exists = $professional->images->contains($image_id);
        	if(!$exists)
        	{
        		$professional->images()->attach($image_id);
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

	                $professional->images()->attach($image->id);
	            }
	            else
	            {
	                return Redirect::to('image')->with('success', 'upload not successful');
	                break;
	            }
        	}
        }

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
        $imageUri = $professional->images->lists('id');
        $imageUri = implode(",", $imageUri) . ",";
        $professional_images = $professional->images;

		return view('professionals.show', compact('professional', 'images', 'imageUri', 'professional_images'));
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
		$professional->logo = Request::get('logo');
        $imageUri = Request::get('imageUri');
        $imageUri = explode(",", $imageUri);
        array_pop($imageUri);
        foreach($professional->images as $image)
        {
        	$professional->images()->detach($image->id);
        }
        foreach($imageUri as $image_id)
        {
        	$exists = $professional->images->contains($image_id);
        	if(!$exists)
        	{
        		$professional->images()->attach($image_id);
        	}
        }
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

