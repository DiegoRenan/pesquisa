<?php namespace App\Http\Controllers\Research;

use App\Gestao\Pesquisador;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Research\GrupoPesquisa;
use Illuminate\Http\Request;

class GrupoPesquisaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $grupos = Pesquisador::find(1)->grupoPesquisa()->orderBy('name', 'asc')->get();

        return view('research.grupo_pesquisa', compact('grupos'));
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
            'name' => 'required'
        ]);

        $novoGrupo = GrupoPesquisa::create($request->all());

        Pesquisador::find(1)->grupoPesquisa()->attach($novoGrupo->idGrupoPesquisa);

        return redirect(route('researcher.grupopesquisa.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Grupo de Pesquisa Criado com sucesso!'
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
        $grupoUp = GrupoPesquisa::findOrFail($id);

        $grupos = GrupoPesquisa::orderBy('name', 'asc')->get();

        return view('research.grupo_pesquisa', compact('grupos', 'grupoUp'));
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

        $grupoUp = GrupoPesquisa::findOrFail($id);

        $grupoUp->update($request->all());

        return redirect(route('researcher.grupopesquisa.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Grupo de Pesquisa Atualizado com sucesso!'
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
        $grupo = GrupoPesquisa::findOrFail($id);

        Pesquisador::find(1)->grupoPesquisa()->detach($grupo->idGrupoPesquisa);

        return redirect(route('researcher.grupopesquisa.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Grupo de Pesquisa Removido com sucesso!'
        ]);
	}

}
