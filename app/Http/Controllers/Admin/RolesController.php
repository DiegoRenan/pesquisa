<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Artesaos\Defender\Facades\Defender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpSpec\Exception\Exception;

class RolesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $roles = DB::table('roles')
            ->where('id', '>', 1)
            ->orderBy('name', 'asc')
            ->get();
        return view('admin.stuff.researchers.roles', compact('roles'));
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
            'name' => 'required|unique:roles'
        ]);

        Defender::createRole(strtolower($request['name']));
        return redirect(route('admin.stuff.roles.index'))->with([
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
        $roles = DB::select('SELECT * FROM roles ORDER BY name ASC');
        $roleUp = Defender::findRoleById($id);
        return view('admin.stuff.researchers.roles', compact(['roles', 'roleUp']));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
        $role = Defender::findRoleById($id);
        $role->update(['name' => strtolower($request['name'])]);
        return redirect(route('admin.stuff.roles.index'))->with([
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
		$role = Defender::findRoleById($id);
        $role->delete();
        return redirect(route('admin.stuff.roles.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
	}

}
