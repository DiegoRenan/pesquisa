<?php namespace App\Http\Controllers\Research;

use App\Gestao\Pesquisador;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stuff\Campus;
use App\Stuff\CategoriaPesquisador;
use App\Stuff\Departamento;
use App\Stuff\Instituto;
use App\Stuff\RegimeTrabalho;
use App\Stuff\Titulacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ResearcherController extends Controller {

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

        return view('research.researcher.create', compact('titles', 'categories', 'works', 'campi'));
	}


    /**
     * Store a newly created resource in storage.
     * @param Requests\PesquisadorCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\PesquisadorCreateRequest $request)
	{
        $pesquisador = Pesquisador::where('cpf', 'like', $request['cpf'])->get()->first();

        if(is_null($pesquisador)) {

            if($request['departamento_id'] == '') $request['departamento_id'] = null;

            if($request['instituto_id'] == '') $request['instituto_id'] = null;

            $pesquisador = new Pesquisador($request->all());

            $pesquisador->flag = 0;

            $pesquisador->save();

            return redirect(url('auth/login/'))->with([
                'flash_type_message' => 'alert-success',
                'flash_message' => 'Informações cadastradas com sucesso!'
            ]);
        }

        elseif($pesquisador->flag == 1) {

            if($request['departamento_id'] == '') $request['departamento_id'] = null;

            if($request['instituto_id'] == '') $request['instituto_id'] = null;

            $pesquisador->flag = 0;

            $pesquisador->update($request->all());

            return redirect(url('auth/login/'))->with([
                'flash_type_message' => 'alert-success',
                'flash_message' => 'Informações cadastradas com sucesso!'
            ]);
        }
        else {

            return redirect(url('auth/login/'))->with([
                'flash_type_message' => 'alert-warning',
                'flash_message' => 'Você já possui cadastro ativo no sistema!'
            ]);
        }
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
		$researcher = Pesquisador::findOrFail($id);

        $titles = Titulacao::orderBy('name', 'asc')->lists('name', 'id');

        $categories = CategoriaPesquisador::orderBy('name', 'asc')->lists('name', 'id');

        $works = RegimeTrabalho::orderBy('name', 'asc')->lists('name', 'id');

        $campi = Campus::orderBy('id', 'asc')->lists('name', 'id');

        return view('research.researcher.edit', compact('researcher','titles', 'categories', 'works', 'campi'));
	}


    /**
     * Update the specified resource in storage.
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
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

        $researcher = Pesquisador::findOrFail($id);

        $researcher->update($request->all());

        return redirect(route('researcher.dashboard'))->with([
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
		//
	}

    /**
     * @return \Illuminate\View\View
     */
    public function editPassword()
    {
        return view('research.researcher.change_password');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' =>  'required',
            'password' => 'required|confirmed|min:6',
        ]);

        if (Hash::check($request['old_password'], Auth::user()->password))
        {
            $password = Hash::make($request['password']);

            User::find(Auth::user()->id)->update(['password' => $password]);

            return redirect(route('researcher.dashboard'))->with([
                'flash_type_message' => 'alert-success',
                'flash_message' => 'Sua Senha foi atualizada com sucesso!'
            ]);
        }

        return redirect()->back()->withInput()->with([
            'flash_type_message' => 'alert-danger',
            'flash_message' => 'O valor do campo Senha Atual está incorreta!'
        ]);
    }


    /* API Functions */
    /**
     * @param $id
     * @return mixed
     */
    public function getInstitutes($id)
    {
        $institutes = Instituto::where('campus_id', '=', $id)->orderBy('name', 'desc')->get();
        //$institutes = Instituto::all();

        return $institutes;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDepartments($id)
    {
        $departments = Departamento::where('campus_id', '=', $id)->orderBy('name', 'asc')->get()->toArray();

        return $departments;
    }

    /**
     * @return mixed
     */
    public function getTitulacaos()
    {
        return Titulacao::all()->orderBy('name', 'asc')->get()->toArry();
    }
}
