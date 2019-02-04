<?php namespace App\Http\Middleware;

use Closure;
use App;

use App\Models\Article;
use App\Models\Category;
use App\Models\Text;
use App\Models\Lang;
use League\Flysystem\Config;

class FrontendInit {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// Get current lang object from db
		$currentLang = Lang::where('lang',"=", $request->lang)
			->first();

		if (!$currentLang){
			abort('404');
		}

		// Locale setting
		App::setLocale($request->lang);

		$hotel = Category::where('link','=', 'hotel')
			->first()
			->articles
			->first();
		$rooms = Category::where('link','=', 'rooms')
			->first()
			->articles()
			->where('active','=', '1')
			->get()
			->sortByDesc("priority");
		$services = Category::where('link','=', 'services')
			->first()
			->articles()
			->where('active','=', 1)
			->get()
			->sortByDesc("priority");

		$texts = new Text();

		/*$textsArray = Text::all();
		//$texts = [];
		foreach($textsArray as $text){
			$desription = $text->getTranslate('description');
			$texts[$text->id] = $desription;
			$texts[$text->name] = $desription;

		}*/


		//MEta



		// Share to views global template variables
		view()->share('langs', Lang::all());
		view()->share('hotel', $hotel);
		view()->share('rooms', $rooms);
		view()->share('services', $services);
		view()->share('texts', $texts->init());
		view()->share('version', config('app.version'));
        //view()->share('meta', $meta);

		return $next($request);
	}

}
