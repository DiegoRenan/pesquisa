<?php namespace App\Http\Controllers\Research;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\News\News;
use App\News\Document;
use App\News\Edital;
use App\News\Evento;

class DashboardController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $today = Carbon::now()->format('Y-m-d H:i:s');
        $qt = 3;

        $newses = News::where('publicated_at', '<=', $today)->orderBy('publicated_at', 'desc')->take($qt)->get();

        $docs = Document::orderBy('created_at', 'desc')->paginate($qt);

        $editals = Edital::orderBy('started_at', 'desc')->paginate($qt);

        $events = Evento::orderBy('start', 'desc')->paginate($qt);

        return view('research.dashboard', compact('newses', 'editals', 'docs', 'events'));
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
