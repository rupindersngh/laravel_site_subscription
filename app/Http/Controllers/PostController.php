<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\Post;
use Validator;
use App\Jobs\NotifyUsers;
use DB;

class PostController extends Controller
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
			'title'		=> 'required|max:255'
		]);

		if($validator->fails())
			return response()->json(['success' => false, 'message' => 'Validation error', 'errors' => $validator->errors()], 401);

		$p = Post::create([
			'site_id'		=> $r->site_id,
			'title'			=> $r->title,
			'description'	=> $r->description
		]);

		$siteSubscribers = Subscriber::where('site_id', $r->site_id)->get();

		$notifiedSubs = [];
		foreach($siteSubscribers as $s){
			dispatch((new NotifyUsers($s->email, 'New Post!!!', [
				'template' => 'simpleMail',

			]))->delay(now()->addSeconds(5)));
			array_push($notifiedSubs, [
				'site_id'	=> $r->site_id,
				'post_id'	=> $p->id
			]);
		}
		if(!empty($notifiedSubs))
			DB::table('notified_users')->insert($notifiedSubs);

		return response()->json(['success' => true, 'message' => 'Post created!', 'post' => $p], 200);
    }

	public function show($id)
    {
        //
    }

	public function edit($id)
    {
        //
    }

	public function update(Request $r, $id)
    {
        //
    }

	public function destroy($id)
    {
        //
    }
}