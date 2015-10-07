<?php namespace App\Http\Controllers\Blog;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News\Document;
use App\News\Edital;
use App\News\Evento;
use App\News\News;
use App\News\Publicacao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller {

	public function index()
    {
        $today = Carbon::now()->format('Y-m-d H:i:s');
        $qt = 10;

        $content = Publicacao::orderBy('created_at', 'desc')->paginate($qt);

        return view('blog.index', compact('content'));
    }

    public function getPub()
    {
        $today = Carbon::now()->format('Y-m-d H:i:s');
        $qt = 100;

        $content = Publicacao::orderBy('created_at', 'desc')->paginate($qt);

        $pubs = [];
        foreach ($content as $key => $value) {
            $pubs[$key] = [
                'id' => $value->id,
                'flagTipo' => $value->present()->flagTipo, 
                'title' => $value->title, 
                'info' => $value->present()->publicadoCompleto, 
                'content' => $value->present()->getSubContent, 
                'link' => $value->present()->link,
                'tipo' => $value->flag_tipo
            ];
        }

        return response()->json($pubs);
    }

    public function newses()
    {
        $today = Carbon::now();

        $newses = News::where('publicated_at', '<=', $today)->orderBy('publicated_at', 'desc')->simplePaginate(5);

        $newses->load('Publicacao');

        return view('blog.news.newses', compact('newses'));
    }

    public function news($id)
    {
        $news = Publicacao::find($id);
        if(is_null($news))
            abort(404);

        $news->load('News');

        return view('blog.news.news', compact('news'));
    }

    public function documents()
    {
        $documents = Publicacao::where('flag_tipo', 'like', 'DC')->orderBy('created_at', 'desc')->simplePaginate(10);

        $documents->load('Documento');

        return view('blog.document.docs', compact('documents'));
    }

    public function document($id)
    {
        $doc = Publicacao::findOrFail($id);

        return view('blog.document.doc', compact('doc'));
    }

    public function editals()
    {
        $editals = Publicacao::where('flag_tipo', 'like', 'ED')->orderBy('created_at', 'desc')->simplePaginate(10);

        $editals->load("Edital");

        return view('blog.edital.editals', compact('editals'));
    }

    public function edital($id)
    {
        $edital = Publicacao::findOrFail($id);

        return view('blog.edital.edital', compact('edital'));
    }

    public function events()
    {
        $today = Carbon::now()->format('Y-m-d');
        $events = Evento::where('start', '>', $today)->orderBy('start', 'desc')->paginate(10);
        $events->load("Publicacao");
        return view('blog.event.events', compact('events'));
    }

    public function event($id)
    {
        $event = Publicacao::findOrFail($id);

        $event->load("Publicacao");

        return view('blog.event.event', compact('event'));
    }
}
