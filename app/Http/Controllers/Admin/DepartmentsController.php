<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stuff\Campus;
use App\Stuff\Departamento;
use Illuminate\Http\Request;

class DepartmentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$departments = Departamento::orderBy('campus_id', 'asc')->get();
        $campuses = Campus::orderBy('sigla', 'asc')->lists('name', 'id');

        return view('admin.stuff.researchers.departments', compact('departments', 'campuses'));
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
            'name' => 'required',
            'campus_id' => 'required'
        ]);

        Departamento::create($request->all());

        return redirect(route('admin.stuff.departments.index'))->with([
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
        return abort(404);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $departmentUp = Departamento::findOrFail($id);

        $departments = Departamento::orderBy('campus_id', 'asc')->get();

        $campuses = Campus::orderBy('sigla', 'asc')->lists('name', 'id');

        return view('admin.stuff.researchers.departments', compact('departments', 'campuses', 'departmentUp'));
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
            'campus_id' => 'required'
        ]);

        $department = Departamento::findOrFail($id);

        $department->update($request->all());

        return redirect(route('admin.stuff.departments.index'))->with([
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
        $department = Departamento::findOrFail($id);

        $department->delete();

        return redirect(route('admin.stuff.departments.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
	}

}
