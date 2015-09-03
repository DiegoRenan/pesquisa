<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stuff\Titulacao;
use Illuminate\Http\Request;

class TitlesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$titles = Titulacao::orderBy('name', 'asc')->get();
        return view('admin.stuff.researchers.titles', compact('titles'));
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
            'name' => 'required|unique:titulacaos'
        ]);

        Titulacao::create(['name' => strtoupper($request['name'])]);

        return redirect(route('admin.stuff.titles.index'))->with([
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
        $titleUp = Titulacao::findOrFail($id);
        $titles = Titulacao::all();
        return view('admin.stuff.researchers.titles', compact('titles', 'titleUp'));
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
            'name' => 'required|unique:titulacaos'
        ]);

        $title = Titulacao::findOrFail($id);

        $title->update(['name' => strtoupper($request['name'])]);

        return redirect(route('admin.stuff.titles.index'))->with([
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
        $title = Titulacao::findOrFail($id);

        $title->delete();

        return redirect(route('admin.stuff.titles.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
	}

}
