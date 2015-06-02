<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News\News;
use App\Http\Requests\NewsCreateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller {

	//
    public function index()
    {
        $news = News::orderBy('publicated_at', 'desc')->paginate(5);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsCreateRequest $request)
    {
        $input = $request->all();
        $input['publicated_at'] = $request->publicated_at.' 00:00:00';
        $input['user_id'] = Auth::user()->id;

        $news = News::create($input);

        return redirect(route('news.index'));
    }

    public function edit($id)
    {
        $news = News::find($id);

        if(is_null($news))
            abort(404);

        return view('admin.news.edit', compact('news'));
    }

    public function update($id, NewsCreateRequest $request)
    {
        $news = News::find($id);

        if(is_null($news))
            abort(404);

        $news->title = $request->title;
        $news->source = $request->source;
        $news->url = $request->url;
        $news->content = $request->content;
        $news->publicated_at = $request->publicated_at.' 00:00:00';
        $news->save();

        return redirect(route('news.index'));
    }

    public function show($id)
    {
        $news = News::find($id);

        if(is_null($news))
            abort(404);

        return view('admin.news.show', compact('news'));
    }

    public function delete($id)
    {
        $news = News::find($id);

        if(is_null($news))
            abort(404);

        $news->delete();

        return redirect(route('news.index'));
    }
}
