<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend;
//use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use App\Models\Article;
use App\Models\Category;
use App\Models\Lang;
use App\Models\Translate;
use App;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\MessageBag;
use Storage;
use Image;


class AdminArticlesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($type = "hotel")
	{
		App::setLocale('ua');
		$admin_category = Category::where("link","=","$type")->first();
		$admin_articles = $admin_category->articles;

		return view('backend.articles.list', [
			'admin_category'=>$admin_category,
			'admin_articles'=>$admin_articles,
			'type'=>$type
		]);
	}

	/**
	 * Minimize uploaded files.
	 *
	 * @return Response
	 */
	public function fileoptimize(Request $request, $id)
	{
		App::setLocale('ua');
		//$admin_category = Category::where("link","=","$type")->first();
		//$admin_articles = $admin_category->articles;
		if (isset($id)){
			$articles = [Article::find($id)];
		}
		else {
			$articles = Article::all();
		}


		foreach($articles as $article){
			$files = Storage::Files('upload/articles/'.$article->id.'/images/');

			foreach($files as $key => $file){
				try{
					Image::make($file)
						->resize(1200, null, function ($constraint) { $constraint->aspectRatio();})
						->save($file, 90);

					echo $file . ' > resized <br />';
				}catch(\Exeption $e){
					echo '<span style="color:red">'. $file . ' > error ' . $e->getMessage() . ' </span><br />';
				}

			}
		}
		exit;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($type)
	{
		$langs = Lang::all();
		$admin_category = Category::where("link","=","$type")->first();
		return view('backend.articles.edit',[
			'langs'=>$langs,
			'admin_category'=>$admin_category,
			'action_method' => 'post'
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, $type)
	{
		$langs = Lang::all();
		foreach($langs as $lang){
			$this->validate($request, [
				'title_'.$lang['lang'] => 'required|max:255',
				//'description_'.$lang['lang'] => 'required',
			]);
		}
		$all = $request->all();
		// Get current category ID
		$category = Category::where('link','=',$type)->first();
		$all['category_id'] = $category->id;
		$all = $this->prepareArticleData($all);

		Article::create($all);
		return response()->json([
			"status" => 'success',
			"message" => 'Успішно збережено',
			"redirect" => URL::to('/admin30x5/articles/'.$type)
		]);
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
	public function edit($type, $id)
	{
		$path = public_path().'/upload/articles/' . $id;

		//$directories = Storage::directories('/public/upload/articles/');
		//dd($directories);
		Storage::makeDirectory('upload/articles/' . $id, '0777', true, true);

		$langs = Lang::all();
		$admin_article = Article::where("id","=","$id")->first();
		$admin_category = Category::where("link","=","$type")->first();



		return view('backend.articles.edit',[
			'admin_article'=>$admin_article,
			'admin_category' => $admin_category,
			'type'=>$type,
			'langs'=>$langs,
			'action_method' => 'put'
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $type, $id)
	{
		$langs = Lang::all();
		foreach($langs as $lang){
			$this->validate($request, [
				'title_'.$lang['lang'] => 'required|max:255',
				//'description_'.$lang['lang'] => 'required',
			]);
		}
		$article = Article::where('id', '=', $id)->first();
		$all = $request->all();
		$files = Storage::Files('upload/articles/'.$id.'/images/');

		Storage::deleteDirectory('upload/articles/' . $id . '/min');
		Storage::deleteDirectory('upload/articles/' . $id . '/full');

		Storage::makeDirectory('upload/articles/' . $id . '/min', '0777', true, true);
		Storage::makeDirectory('upload/articles/' . $id . '/full', '0777', true, true);

		foreach($files as $key => $file){
			$savePathMin = str_replace('/'.$id.'/images/', '/'.$id.'/min/', $file);
			$savePathFull = str_replace('/'.$id.'/images/', '/'.$id.'/full/', $file);
			try{
				$image = Image::make($file)
					->resize(1200, null, function ($constraint) { $constraint->aspectRatio();})
					->save($savePathFull, 80)
					->resize(320, null, function ($constraint) { $constraint->aspectRatio(); })
					->save($savePathMin, 80);

				$files[$key] = [
					'full' => $savePathFull,
					'min' => $savePathMin
				];
			}catch(\Exception $e){
				$files[$key] = [
					'full' => $file,
					'min' => $file
				];
			}

		}

		$all['imgs'] = json_encode($files);
		$all = $this->prepareArticleData($all);

		//dd($all);
		$article->update($all);
		$article->save();

		return response()->json([
			"status" => 'success',
			"message" => 'Успішно збережено',
			"redirect" => URL::to('/admin30x5/articles/'.$type)
		]);
	}
	private function prepareArticleData($all){
		$langs = Lang::all();
		$all['title'] = '';
		$all['description'] = '';
		$all['meta_title'] = '';
		$all['meta_description'] = '';
		$all['meta_keywords'] ='';
		if (isset($all['date']))
			$all['date'] = date('Y-m-d H:i:s',strtotime($all['date']));
		foreach($all as $key => $value){
			$all[$key] = trim($value);
		}
		foreach($langs as $lang){
			$all['title'] .= $all["title_{$lang['lang']}"] .'@|;';
			$all['description'] .= (isset($all["description_{$lang['lang']}"]) ? $all["description_{$lang['lang']}"] : '') .'@|;';
			$all['meta_title'] .= (isset($all["meta_title_{$lang['lang']}"]) ? $all["meta_title_{$lang['lang']}"] : '') .'@|;';
			$all['meta_description'] .= (isset($all["meta_description_{$lang['lang']}"]) ? $all["meta_description_{$lang['lang']}"] : '') .'@|;';
			$all['meta_keywords'] .= (isset($all["meta_keywords_{$lang['lang']}"]) ? $all["meta_keywords_{$lang['lang']}"] : '') .'@|;';
			unset($all["title_{$lang['lang']}"]);
			unset($all["description_{$lang['lang']}"]);
			unset($all["meta_title_{$lang['lang']}"]);
			unset($all["meta_description_{$lang['lang']}"]);
			unset($all["meta_keywords_{$lang['lang']}"]);
		}
		return $all;
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($type, $id)
	{
		$article = Article::where('id', '=', $id)->first();
		if($article AND $article->delete()){
			Storage::deleteDirectory('upload/articles/' . $id);

			return response()->json([
				"status" => 'success',
				"message" => 'Успешно удален'
			]);
		}
		else{
			return response()->json([
				"status" => 'error',
				"message" => 'Произошла ошибка при удалении'
			]);
		}

	}

}
