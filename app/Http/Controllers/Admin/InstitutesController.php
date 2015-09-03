<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stuff\Campus;
use App\Stuff\Instituto;
use Illuminate\Http\Request;

class InstitutesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$institutes = Instituto::orderBy('campus_id', 'asc')->get();
        $campuses = Campus::orderBy('sigla', 'asc')->lists('name', 'id');

        return view('admin.stuff.researchers.institutes', compact('institutes', 'campuses'));
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
           'name' => 'required',
           'sigla' => 'required',
           'campus_id' => 'required'
        ]);

        Instituto::create($request->all());

        return redirect(route('admin.stuff.institutes.index'))->with([
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
        $instituteUp = Instituto::findOrFail($id);

        $institutes = Instituto::orderBy('campus_id', 'asc')->get();

        $campuses = Campus::orderBy('sigla', 'asc')->lists('name', 'id');

        return view('admin.stuff.researchers.institutes', compact('institutes', 'campuses', 'instituteUp'));
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
            'name' => 'required',
            'sigla' => 'required',
            'campus_id' => 'required'
        ]);

        $institute = Instituto::findOrFail($id);

        $institute->update($request->all());

        return redirect(route('admin.stuff.institutes.index'))->with([
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
        $institute = Instituto::findOrFail($id);

        $institute->delete();

        return redirect(route('admin.stuff.institutes.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
	}

}
