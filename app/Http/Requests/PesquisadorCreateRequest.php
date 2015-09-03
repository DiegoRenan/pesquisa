<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PesquisadorCreateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'nome' => 'required',

            'matricula' => 'required',

            'cpf' => 'required',

            'dt_nascimento' => 'required|date',

            'rg' => 'required',

            'email' => 'required|email',

            'telefone' => 'required_without:fax,celular',

            'fax' => 'required_without:telefone,celular',

            'celular' => 'required_without:telefone,fax',

            'link_lattes' => 'required|url',

            'titulacao_id' => 'required|exists:titulacaos,id',

            'categoria_id' => 'required|exists:categorias,id',

            'regime_trabalho_id' => 'required|exists:regime_trabalhos,id',

            'instituto_id' => 'required_without:departamento_id',

            'departamento_id' => 'required_without:instituto_id'
		];
	}

}
