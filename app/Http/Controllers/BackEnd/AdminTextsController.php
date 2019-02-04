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
use App\Models\Text;
use App;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\MessageBag;
use Storage;


class AdminTextsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		App::setLocale('ua');

		$admin_texts = Text::all()
			->sortByDesc("priority");

		return view('backend.texts.list',[
			'admin_texts' => $admin_texts
			]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$langs = Lang::all();
		return view('backend.texts.create', [
			'langs'=>$langs,
			'action_method' => 'post'
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$langs = Lang::all();
		foreach($langs as $lang){
			$this->validate($request, [
				'title' => 'required|max:255',
			]);
		}
		$all = $request->all();
		$all = $this->prepareTextData($all);

		Text::create($all);
		return response()->json([
			"status" => 'success',
			"message" => 'Успішно збережено',
			"redirect" => URL::to('/admin30x5/texts')
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
	public function edit($id)
	{
		$langs = Lang::all();
		$admin_text = Text::where("id","=","$id")->first();
		return view('backend.texts.edit',[
			'admin_text'=>$admin_text,
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
	public function update(Request $request, $id)
	{
		$langs = Lang::all();
		/*foreach($langs as $lang){
			$this->validate($request, [
				'title_'.$lang['lang'] => 'required|max:255',

			]);
		}*/
		$admin_text = Text::where('id', '=', $id)->first();
		$all = $request->all();
		$all = $this->prepareTextData($all);
		//dd($all);
		$admin_text->update($all);
		$admin_text->save();
		return response()->json([
			"status" => 'success',
			"message" => 'Успішно збережено',
			"redirect" => URL::to('/admin30x5/texts')
		]);
	}

	private function prepareTextData($all){
		$langs = Lang::all();

		if(isset($all['description']))
			return $all;


		$all['description'] = '';
		foreach($all as $key => $value){
			$all[$key] = trim($value);
		}
		foreach($langs as $lang){

			if($all['lang_active'] == 0){
				$all['description'] .= (isset($all["description_{$lang['lang']}"]) ? $all["description_{$lang['lang']}"] : '');
			}else{
				$all['description'] .= (isset($all["description_{$lang['lang']}"]) ? $all["description_{$lang['lang']}"] : '') .'@|;';
			}

			unset($all["description_{$lang['lang']}"]);

		}

		return $all;
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$text = Text::where('id', '=', $id)->first();
		if($text AND $text->delete()){
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
