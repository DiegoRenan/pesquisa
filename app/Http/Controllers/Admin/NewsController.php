<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News\News;
use App\Http\Requests\NewsCreateRequest;
use App\News\Publicacao;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller {

	//
    public function index()
    {
        $news = Publicacao::orderBy('created_at', 'desc')->where('flag_tipo', 'like', 'NW')->paginate(15);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsCreateRequest $request)
    {
        $request['flag_tipo'] = 'NW';
        $request['user_id'] = Auth::user()->id;

        $pub = Publicacao::create($request->all());

        $news = new News(['publicated_at' => $request['publicated_at']]);

        $pub->news()->save($news);

        return redirect(route('news.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações cadastradas com sucesso!'
        ]);
    }

    public function edit($id)
    {
        $news = Publicacao::findOrFail($id);

        return view('admin.news.edit', compact('news'));
    }

    public function update($id, NewsCreateRequest $request)
    {
        $pub = Publicacao::findOrFail($id);

        $pub->update($request->all());

        $pub->news()->update(['publicated_at' => $request['publicated_at']]);

        return redirect(route('news.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações atualizadas com sucesso!'
        ]);
    }

    public function show($id)
    {
        $news = Publicacao::findOrFail($id);

        return view('admin.news.show', compact('news'));
    }

    public function delete($id)
    {
        $pub = Publicacao::findOrFail($id);

        $pub->delete();

        return redirect(route('news.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
    }
}
