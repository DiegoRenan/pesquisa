<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stuff\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$campuses = Campus::orderBy('sigla', 'asc')->get();

        return view('admin.stuff.researchers.campus', compact('campuses'));
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
            'name' => 'required|unique:campus',
            'sigla' => 'required'
        ]);

        Campus::create($request->all());

        return redirect(route('admin.stuff.campus.index'))->with([
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
		$campusUp = Campus::findOrFail($id);

        $campuses = Campus::orderBy('name', 'asc')->get();

        return view('admin.stuff.researchers.campus', compact('campuses', 'campusUp'));
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
            'sigla' => 'required'
        ]);

        $campus = Campus::findOrFail($id);

        $campus->update($request->all());

        return redirect(route('admin.stuff.campus.index'))->with([
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
        $campus = Campus::findOrFail($id);

        $campus->delete();

        return redirect(route('admin.stuff.campus.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
	}

}
