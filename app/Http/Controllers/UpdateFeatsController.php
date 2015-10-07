<?php namespace App\Http\Controllers;

use App\Feat;
use App\Image;
use Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;

class UpdateFeatsController extends Controller {

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
		$feats = Feat::all();
        $images = Image::all();
        foreach($feats as $feat)
        {
            $imageUri = $feat->imageUri;
            $image_array = explode(',', $imageUri);
            array_pop($image_array);
            
            $feat_images = array();
            foreach($image_array as $image_id)
            {
                array_push($feat_images, Image::find($image_id));
            }

            $feat->imageUri = $feat_images;
        }

		return view('feats.index', compact('feats', 'images'));
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

		Feat::create($input);

		return redirect('update_feats');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$feat = Feat::findOrFail($id);
        $images = Image::all();
        $imageUri = $feat->imageUri;
        $image_array = explode(',', $imageUri);
        array_pop($image_array);
        
        $feat_images = array();
        foreach($image_array as $image_id)
        {
            array_push($feat_images, Image::find($image_id));
        }

        $feat->imageUri = $feat_images;
		return view('feats.show', compact('feat', 'images'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$feat = Feat::findOrFail($id);
		$feat->name = Request::get('name');
		$feat->occupation = Request::get('occupation');
		$feat->issuer = Request::get('issuer');
		$feat->time_period = Request::get('time_period');
		$feat->description = Request::get('description');
        $feat->imageUri = Request::get('imageUri');
		$feat->save();

		return Redirect::to('update_feats')->with('success', 'edit success');
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
		$feat = Feat::findOrFail($id);
		$feat->delete();

		return Redirect::to('update_feats')->with('success', 'delete success');
	}

}
