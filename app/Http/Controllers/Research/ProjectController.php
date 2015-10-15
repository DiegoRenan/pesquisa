<?php namespace App\Http\Controllers\Research;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProjectController extends Controller {

	public function create()
    {
        return view('research.project.create');
    }

    public function getDados()
    {

    	sleep(10);
    	$json = [
	            'dadosPessoais' => [
	                'nome' => "Vinicius Fernandes Brito",
	                'matricula' => "200811722003",
	                'cpf' => "022.181.461-26",
	                'rg' => "1960244-8 SSP MT",
	                'dataNasc' => "19/04/1989",
	                'endereco' => [
	                    'cep' => "78600000",
	                    'rua' => "Rua 27",
	                    'numero' => "74",
	                    'complemento' => "Prox Escadaria",
	                    'bairro' => "Santo Antonio",
	                    'cidade' => "Barra do Garças",
	                    'uf' => "MT"

	                ],
	                'fone' => "6634014730",
	                'celular' => "6699317500",
	                'fax' => "6634014730",
	                'email' => "vinicius.fernandes.brito@gmail.complemento",
	                'categoria' => "ALUNO",
	                'titulacao' => "GRADUADO"
	            ],
	            'localTrabalho' => [
	                'unidade' => "Campus Universitário do Araguaia",
	                'fone' => "6634014730",
	                'regime' => "ALUNO"
	            ],
	            'enquadramento' => [
	                'titulo' => 'Título do Projeto Veio Pela API',
	                'dataInicio' => '2015-10-09',
	                'duracao' => '12',
	                'convenio' => 'Não Possui convênio',
	                'financiador' => 'Não possui financiador',
	                'area' => '1',
	                'subArea' => '1',
	                'grupoPesquisa' => '1',
	                'descricao' => 'Aqui é a descrição do projeto',
	                'palavra1' => 'palavra chave 1',
	                'palavra2' => 'palavra chave 2',
	                'palavra3' => 'palavra chave 3'

	            ],
	            'caracterizacao' => "Aqui é um texto enorme de caracterizacao do projeto",
	            'objetivos' => "Aqui é um texto enorme de objetivos do projeto",
	            'metodologia' => "Aqui é um texto enorme de metodologia do projeto",
	            'membros' => [],
	            'orcamento' => [
	                'materialConsumo' => '10.00',
	                'servicosPessoaFisica' => '10.00',
	                'servicosPessoaJuridica' => '10.00',
	                'obrasInstalacoes' => '10.00',
	                'equipamentoMaterial' => '10.00',
	                'total' => 'R$ 50.00'
	            ],
	            'cronograma' => [],
	            'referencias' => "Aqui é um texto enorme de referências do projeto",
	            'anexos' => [
	                
	                ['nome' => 'Nome Arquivo 1', 'id' => '1'],
	                ['nome' => 'Nome Arquivo 3', 'id' => '3'],
	                ['nome' => 'Nome Arquivo 2', 'id' => '2']
	            ]	        
        ];

        return $json;
    }

}
