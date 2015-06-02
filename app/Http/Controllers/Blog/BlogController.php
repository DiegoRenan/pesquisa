<?php namespace App\Http\Controllers\Blog;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News\Document;
use App\News\Edital;
use App\News\Evento;
use App\News\News;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller {

	public function index()
    {
        $today = Carbon::now()->format('Y-m-d H:i:s');
        $qt = 10;

        $newses = News::where('publicated_at', '<', $today)->take($qt)->get();

        $docs = Document::orderBy('created_at', 'desc')->paginate($qt);

        $editals = Edital::orderBy('started_at', 'desc')->paginate($qt);

        $events = Evento::orderBy('start', 'desc')->paginate($qt);

        return view('blog.index')->with([
            'newses' => $newses,
            'docs' => $docs,
            'editals' => $editals,
            'events' => $events
        ]);
    }

    public function newses()
    {
        $today = Carbon::now()->format('Y-m-d H:i:s');

        $newses = News::where('publicated_at', '<', $today)->paginate(10);

        return view('blog.news.newses', compact('newses'));
    }

    public function news($id)
    {
        $news = News::find($id);

        if(is_null($news))
            abort(404);

        return view('blog.news.news', compact('news'));
    }

    public function documents()
    {
        $documents = Document::orderBy('created_at', 'desc')->paginate(10);

        return view('blog.document.docs', compact('documents'));
    }

    public function document($id)
    {
        $doc = Document::find($id);

        if(is_null($doc))
            abort(404);

        return view('blog.document.doc', compact('doc'));
    }

    public function editals()
    {
        $editals = Edital::orderBy('created_at', 'desc')->paginate(10);

        return view('blog.edital.editals', compact('editals'));
    }

    public function edital($id)
    {
        $edital = Edital::find($id);

        if(is_null($edital))
            abort(404);

        return view('blog.edital.edital', compact('edital'));
    }

    public function events()
    {
        $events = Evento::orderBy('start', 'desc')->paginate(10);

        return view('blog.event.events', compact('events'));
    }

    public function event($id)
    {
        $event = Evento::find($id);

        if(is_null($event))
            abort(404);

        return view('blog.event.event', compact('event'));
    }
}
