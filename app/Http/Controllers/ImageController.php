<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller {

    public $restful = true;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $images = Image::all();

		return view('images.index', compact('images'));
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
        foreach(Input::file('image') as $file)
        {
            if($file->isValid())
            {
                $destinationPath = public_path() . '/uploads/'; // upload path
                $fileName = $file->getClientOriginalName(); // renameing image
                $file->move($destinationPath, $fileName); // uploading file to given path

                Image::create([
                    "title" => Input::input('title'),
                    "description" => Input::input('description'),
                    "location" => '../../uploads/' . $fileName
                ]);
            }
            else
            {
                return Redirect::to('image')->with('success', 'upload not successful');
                break;
            }
        }
        return Redirect::to('image')->with('success', 'upload success');
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
