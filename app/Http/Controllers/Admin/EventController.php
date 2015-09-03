<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News\Evento;
use App\News\Publicacao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $events = Publicacao::orderBy('created_at', 'desc')->where('flag_tipo', 'like', 'EV')->paginate(15);

		return view('admin.event.index', compact('events'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('admin.event.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(EventRequest $request)
	{
        $request['flag_tipo'] = 'EV';
        $request['user_id'] = Auth::user()->id;

        if(!$request->has('alltime'))
            $request['alltime'] = false;

        if(!$request->has('hour'))
            $request['hour'] = null;

        $pub = Publicacao::create($request->all());

        $evento = new Evento($request->all());

        $pub->evento()->save($evento);

        return redirect(route('event.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações cadastradas com sucesso!'
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
        $event = Publicacao::find($id);

        if(is_null($event))
            abort(404);

        $event->load('Evento');

        return view('admin.event.show', compact('event'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $event = Publicacao::find($id);

        if(is_null($event))
            abort(404);

        $event->load('Evento');

        return view('admin.event.edit', compact('event'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EventRequest $request)
	{
        $event = Publicacao::find($id);

        if(is_null($event))
            abort(404);

        $input = $request->all();

        $event->update($input);

        return redirect(route('event.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações atualizadas com sucesso!'
        ]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
        $event = Publicacao::find($id);

        if(is_null($event))
            abort(404);

        $event->load('Evento');

        $event->delete();

        return redirect(route('event.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
	}

}
