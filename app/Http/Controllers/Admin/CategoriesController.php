<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stuff\CategoriaPesquisador;
use Illuminate\Http\Request;

class CategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = CategoriaPesquisador::orderBy('name', 'asc')->get();
        return view('admin.stuff.researchers.categories', compact('categories'));
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
            'name' => 'required|unique:categorias'
        ]);

        CategoriaPesquisador::create(['name' => strtoupper($request['name'])]);

        return redirect(route('admin.stuff.categories.index'))->with([
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
        $categoryUp = CategoriaPesquisador::findOrFail($id);

        $categories = CategoriaPesquisador::orderBy('name', 'asc')->get();

        return view('admin.stuff.researchers.categories', compact('categories', 'categoryUp'));
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
            'name' => 'required|unique:categorias'
        ]);

        $category = CategoriaPesquisador::findOrFail($id);

        $category->update(['name' => strtoupper($request['name'])]);

        return redirect(route('admin.stuff.categories.index'))->with([
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
        $category = CategoriaPesquisador::findOrFail($id);

        $category->delete();

        return redirect(route('admin.stuff.categories.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
	}

}
