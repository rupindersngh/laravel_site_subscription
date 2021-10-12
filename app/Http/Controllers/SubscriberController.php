<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Validator;

class SubscriberController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $r)
    {
		$validator = Validator::make($r->all(), [
			'site_id'	=> 'required',
			'email'		=> 'required'
		]);

		if($validator->fails())
			return response()->json(['success' => false, 'message' => 'Validation error', 'errors' => $validator->errors()], 401);

		Subscriber::create([
			'site_id'	=> $r->site_id,
			'email'		=> $r->email
		]);

		return response()->json(['success' => true, 'Subscribed to the site!'], 200);
    }

	public function show($id)
    {
        //
    }

	public function edit($id)
    {
        //
    }

	public function update(Request $request, $id)
    {
        //
    }

	public function destroy($id)
    {
        //
    }
}