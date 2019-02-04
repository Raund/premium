<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;

use Illuminate\Http\Request;

class TourController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()	{
		$meta = view()->share('meta', Article::where('name', '=', 'meta.booking')->first());

		return view('frontend.3dtour', [
			'meta' => $meta
		]);
	}
}
