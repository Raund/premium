<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;

use Illuminate\Http\Request;

class BookingController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	$meta = view()->share('meta', Article::where('name', '=', 'meta.booking')->first());

		return view('frontend.booking', [
			'from'  => $request->input('from'),
			'to' 	=> $request->input('to'),
			'meta' => $meta
		]);
	}


}
