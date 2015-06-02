<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News\Evento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $events = Evento::orderBy('created_at', 'desc')->paginate(5);
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
        $input = $request->all();

        if(!$request->has('alltime'))
            $input['alltime'] = false;

        if(!$request->has('hour'))
            $input['hour'] = null;

        Evento::create($input);

        return redirect(route('event.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $event = Evento::find($id);

        if(is_null($event))
            abort(404);

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
        $event = Evento::find($id);

        if(is_null($event))
            abort(404);

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
        $event = Evento::find($id);

        if(is_null($event))
            abort(404);

        $input = $request->all();

        $event->update($input);

        return redirect(route('event.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
        $event = Evento::find($id);

        if(is_null($event))
            abort(404);

        $event->delete();

        return redirect(route('event.index'));
	}

}
