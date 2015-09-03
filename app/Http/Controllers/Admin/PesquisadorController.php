<?php namespace App\Http\Controllers\Admin;

use App\Gestao\Pesquisador;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stuff\Campus;
use App\Stuff\CategoriaPesquisador;
use App\Stuff\RegimeTrabalho;
use App\Stuff\Titulacao;
use Illuminate\Http\Request;
use App\Http\Requests\PesquisadorCreateRequest;

class PesquisadorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $pesquisadores = Pesquisador::all();
        return view('admin/pesquisador/index', compact('pesquisadores'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $titles = Titulacao::orderBy('name', 'asc')->lists('name', 'id');

        $categories = CategoriaPesquisador::orderBy('name', 'asc')->lists('name', 'id');

        $works = RegimeTrabalho::orderBy('name', 'asc')->lists('name', 'id');

        $campi = Campus::orderBy('id', 'asc')->lists('name', 'id');

        return view('admin/pesquisador/create', compact('titles', 'categories', 'works', 'campi'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PesquisadorCreateRequest $request)
	{
        $this->validate($request, [
            'nome' => 'required',
            'link_lattes' => 'required|url',
            'titulacao_id' => 'required',
            'categoria_id' => 'required',
            'regime_trabalho_id' => 'required',
            'instituto_id' => 'numeric|required_without:departamento_id',
            'departamento_id' => 'numeric|required_without:instituto_id'
        ]);

        $pesquisador = Pesquisador::create($request->all());

        return redirect(route('admin.pesquisador.show', $pesquisador->id))->with([
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
		$pesquisador = Pesquisador::findOrFail($id);
        return view('admin.pesquisador.show', compact('pesquisador'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pesquisador = Pesquisador::findOrFail($id);

        $titles = Titulacao::orderBy('name', 'asc')->lists('name', 'id');

        $categories = CategoriaPesquisador::orderBy('name', 'asc')->lists('name', 'id');

        $works = RegimeTrabalho::orderBy('name', 'asc')->lists('name', 'id');

        $campi = Campus::orderBy('id', 'asc')->lists('name', 'id');

        return view('admin.pesquisador.edit', compact('pesquisador','titles', 'categories', 'works', 'campi'));
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
            'nome' => 'required',
            'link_lattes' => 'required|url',
            'titulacao_id' => 'required',
            'categoria_id' => 'required',
            'regime_trabalho_id' => 'required',
            'instituto_id' => 'numeric|required_without:departamento_id',
            'departamento_id' => 'numeric|required_without:instituto_id'
        ]);

        $pesquisador = Pesquisador::findOrFail($id);

        $pesquisador->update($request->all());

        return redirect(route('admin.pesquisador.show', $pesquisador->id))->with([
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
        $pesquisador = Pesquisador::findOrFail($id);
        $pesquisador->delete();
        return redirect(route('admin.pesquisador.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
	}

}
