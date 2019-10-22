<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
	public function index() {
		$urls = Url::paginate();

		$created_id = session('created');

		if($created_id ?? false) {
			$created_url = Url::find($created_id);
		}

		return view('site.index', compact('urls'))->with('createdUrl', $created_url ?? NULL);
	}


	public function store(Request $request) {
		$url = Url::create($request->all());

		return back()->with('created', $url->id);
	}


	public function edit($id) {
		//
	}


	public function update(Request $request, $id) {
		//
	}


	public function destroy($id) {
		//
	}
}
