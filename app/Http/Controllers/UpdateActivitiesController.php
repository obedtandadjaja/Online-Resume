<?php namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Redirect;
use App\Activity;
use App\Http\Requests;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;

class UpdateActivitiesController extends Controller {

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
		$activities = Activity::latest()->get();

		return view('activities.index', compact('activities'));
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

		Activity::create($input);

		return redirect('update_activities');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$activity = Activity::findOrFail($id);

		return view('activities.show', compact('activity'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$activity = Activity::findOrFail($id);
		$activity->name = Request::get('name');
		$activity->time_period = Request::get('time_period');
		$activity->description = Request::get('description');
		$activity->save();

		return Redirect::to('update_activities')->with('success', 'edit success');
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
		$activity = Activity::findOrFail($id);
		$activity->delete();

		return Redirect::to('update_activities')->with('success', 'delete success');
	}

}
