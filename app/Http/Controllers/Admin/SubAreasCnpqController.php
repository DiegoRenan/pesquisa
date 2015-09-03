<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stuff\AreaCnpq;
use App\Stuff\SubAreaCnpq;
use Illuminate\Http\Request;

class SubAreasCnpqController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $subareas = SubAreaCnpq::orderBy('name', 'asc')->get();

		$areas = AreaCnpq::orderBy('name', 'asc')->lists('name', 'id');

        return view('admin.stuff.projects.subAreasCnpq', compact('subareas', 'areas'));
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
            'name' => 'required|unique:sub_areas_cnpq',
            'area_id' => 'required'
        ]);

        SubAreaCnpq::create($request->all());

        return redirect(route('admin.stuff.subareacnpq.index'))->with([
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
        $subareaUp = SubAreaCnpq::findOrFail($id);

        $subareas = SubAreaCnpq::orderBy('name', 'asc')->get();

        $areas = AreaCnpq::orderBy('name', 'asc')->lists('name', 'id');

        return view('admin.stuff.projects.subAreasCnpq', compact('subareaUp', 'subareas', 'areas'));
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
            'area_id' => 'required'
        ]);

        $subareaUp = SubAreaCnpq::findOrFail($id);

        $subareaUp->update($request->all());

        return redirect(route('admin.stuff.subareacnpq.index'))->with([
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
        $subareaUp = SubAreaCnpq::findOrFail($id);

        $subareaUp->delete();

        return redirect(route('admin.stuff.subareacnpq.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
	}

}
