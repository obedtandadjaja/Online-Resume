<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Feat;
use App\Activity;
use Illuminate\Http\Request;
use Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = User::find(1);
		$feats = Feat::all();
		$activities = Activity::all();
		return view('contact', compact('user', 'feats', 'activities'));
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
		//Get all the data and store it inside Store Variable
            $data = Input::all();
 
            //Validation rules
            $rules = array (
                'name' => 'required',
                'email' => 'required|email',
                'bodymessage'=>'required',
            );
 
            //Validate data
            $validator  = Validator::make($data, $rules);
 
            //If everything is correct than run passes.
            if ($validator -> passes())
            {
                //Send email using Laravel send function
                $sent = Mail::send('emails.contact', $data, function($message) use ($data)
                {
					//email 'From' field: Get users email add and name
                    $message->from($data['email'] , $data['name']);
					//email 'To' field: cahnge this to emails that you want to be notified.
					$message->to('obed.tandadjaja@gmail.com', 'Obed Tandadjaja')->subject('Contact Request');
                });
                return view('contact');
            }
            else
            {
				//return contact form with errors
				dd($validator);
                return Redirect::to('/contact')->withErrors($validator);
            }
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
