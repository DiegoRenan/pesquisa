<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stuff\RegimeTrabalho;
use Illuminate\Http\Request;

class WorksController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$works = RegimeTrabalho::orderBy('name', 'asc')->get();
        return view('admin.stuff.researchers.works', compact('works'));
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
	public function store(Request $request)
	{
		$this->validate($request, [
            'name' => 'required|unique:regime_trabalhos'
        ]);

        RegimeTrabalho::create(['name' => strtoupper($request['name'])]);

        return redirect(route('admin.stuff.works.index'))->with([
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
        $workUp = RegimeTrabalho::findOrFail($id);

        $works = RegimeTrabalho::orderBy('name', 'asc')->get();

        return view('admin.stuff.researchers.works', compact('works', 'workUp'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
        $this->validate($request, [
            'name' => 'required|unique:regime_trabalhos'
        ]);

        $work = RegimeTrabalho::findOrFail($id);

        $work->update(['name' => strtoupper($request['name'])]);

        return redirect(route('admin.stuff.works.index'))->with([
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
	public function destroy($id)
	{
        $work = RegimeTrabalho::findOrFail($id);

        $work->delete();

        return redirect(route('admin.stuff.works.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
	}

}
