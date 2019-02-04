<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend;
//use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;

use App\Models\Article;
use App\Models\Category;
use App\Models\Lang;
use App;
use Illuminate\Support\Facades\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


//use Illuminate\Contracts\View\View;

class ArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($lang, $type = 'hotel')
	{
		$events = null;
		$gallery = null;
		$slides = null;

		switch($type){
            case 'hotel':
				$slides = Category::where('link','=', 'slider')
					->first()
					->articles()
					->where('active','=', 1)
					->get()
					->sortByDesc("priority");
				break;
			case 'rooms':
				break;
			case 'services':
				break;
			case 'events':
                $events = Category::where('link','=', 'events')
				->first()
				->articles()
				->where('active','=', '1')
				->orderBy("priority", 'desc')
				->paginate(5);
				break;
			case 'gallery':
                $gallery = Category::where('link','=', 'gallery')
                    ->first()
                    ->articles()
					->where('active','=', 1)
					->get()
					->sortByDesc("priority");
				break;

		}

		 $meta = view()->share('meta', Article::where('name', '=', 'meta.'.$type)->first());


		return view('frontend.'.$type, [
			'events' => $events,
			'gallery' => $gallery,
			'slides' => $slides,

		]);
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
		//
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
