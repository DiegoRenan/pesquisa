<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stuff\AreaCnpq;
use Illuminate\Http\Request;

class AreasCnpqController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$areas = AreaCnpq::orderBy('name', 'asc')->get();

        return view('admin.stuff.projects.areasCnpq', compact('areas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return abort(404);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
            'name' => 'required|unique:areas_cnpq'
        ]);

        AreaCnpq::create($request->all());

        return redirect(route('admin.stuff.areacnpq.index'))->with([
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
        $areas = AreaCnpq::orderBy('name', 'asc')->get();

        $areaUp = AreaCnpq::findOrFail($id);

        return view('admin.stuff.projects.areasCnpq', compact('areas', 'areaUp'));
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
            'name' => 'required'
        ]);

        $area = AreaCnpq::findOrFail($id);

        $area->update($request->all());

        return redirect(route('admin.stuff.areacnpq.index'))->with([
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
        $area = AreaCnpq::findOrFail($id);

        $area->delete();

        return redirect(route('admin.stuff.areacnpq.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
	}

}
