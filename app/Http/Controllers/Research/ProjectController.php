<?php namespace App\Http\Controllers\Research;

use App\Gestao\Membro;
use App\Gestao\Orcamento;
use App\Gestao\PalavrasChave;
use App\Gestao\Pesquisador;
use App\Gestao\Projeto;
use App\Gestao\ProjetoDatas;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Research\GrupoPesquisa;
use App\Stuff\AreaCnpq;
use App\Stuff\CategoriaPesquisador;
use App\Stuff\SubAreaCnpq;
use App\Stuff\Titulacao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller {

	public function create()
    {
        $titles = Titulacao::orderBy('name', 'asc')->lists('name', 'id');

        $categories = CategoriaPesquisador::orderBy('name', 'asc')->lists('name', 'id');

        $area = AreaCnpq::all()->lists('name', 'id');

        $subArea = SubAreaCnpq::all()->lists('name', 'id');

        $duracao = [];
        for($i = 6; $i <= 36; $i+=6) {
            $duracao[$i] = "$i Meses";
        }

        return view('research.project.create', compact('titles', 'categories', 'area', 'subArea', 'duracao'));
    }

    public function getDados()
    {
    	//sleep(5);
    	$json = [
                'idProjeto' => null,
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

	            'projeto' => [
	                'titulo' => '',
                    'descricao' => '',
                    'caracterizacao' => "",
                    'objetivos' => "",
                    'metodologia' => "",
                    'referencias' => "",
	                'convenio_id' => '',
	                'financiador_id' => '',
	                'area_id' => '',
	                'subAreaConhecimento_id' => '',
	                'grupoPesquisa_id' => '',
	                'pesquisador_id' => 1,
	            ],
	            'projetoDatas' => [
                    'dataInicio' => Carbon::now()->format('Y-m-d'),
                    'duracao' => '6',
                ],
                'palavrasChave' => [
                    'palavra1' => '',
                    'palavra2' => '',
                    'palavra3' => ''
                ],
	            'membros' => [],
	            'orcamento' => [
	                'materialConsumo' => '',
	                'servicosPessoaFisica' => '',
	                'servicosPessoaJuridica' => '',
	                'obrasInstalacoes' => '',
	                'equipamentoMaterial' => '',
	                'total' => ''
	            ],
	            'cronograma' => [],
	            'anexos' => []
        ];

        return response()->json($json);
    }

    public function saveDados(Request $request)
    {
        $json = $request->all();

        $idProjeto = $request['idProjeto'];
        /*
         * $dadosPessoais = $request['dadosPessoais'];
         * $localTrabalho = $request['localTrabalho'];
        */
        $projeto = $request['projeto'];
        $projetoDatas = $request['projetoDatas'];
        $palavrasChave = $request['palavrasChave'];
        $membros = $request['membros'];
        $orcamento = $request['orcamento'];
        $cronograma = $request['cronograma'];
        $anexos = $request['anexos'];

        if($idProjeto) {
            $proj = Projeto::findOrFail($idProjeto);
            $proj->update($projeto);
        }
        else {
            /* Criando Projeto */
            $proj = new Projeto($projeto);
            $proj->save();

            /* Salvando as Dadas */
            $data = new ProjetoDatas($projetoDatas);
            $proj->projetoDatas()->save($data);

            /* Salvando  palavras chave */
            foreach($palavrasChave as $palavra) {
                $p = new PalavrasChave(['palavra' => $palavra]);
                $proj->palavrasChave()->save($p);
            }

            /* Salvando Membros */
            $members = [];
            foreach($membros as $mb) {
                $members[$mb['idMembro']] = array('cargaHoraria' => $mb['cargaHoraria']);
            }
            $proj->membros()->sync($members);

            /* Salvando Orcamento */
            $orc = new Orcamento($orcamento);
            $proj->orcamento()->save($orc);

            /* Salvando Cronograma */
            /* Salvando Anexos */

        }
        $json['idProjeto'] = $proj->idProjeto;
        return response()->json($json);
    }

    public function searchMembro(Request $request)
    {
        $membro = Membro::where('cpf', 'like', $request->cpf)->first();
        if(($membro)) {
            return
                [
                    'data'  => [
                        'idMembro' => $membro->idMembro,
                        'nome' => $membro->nome_membro,
                        'cpf' => $membro->cpf,
                        'instituicao' => $membro->instituicao,
                        'titulacao_id' => $membro->titulacao_id,
                        'categoria_id' => $membro->categoria_id,
                        'cargaHoraria' => ''
                    ],
                    'exibir' => true
                ];
        }
        else {
            return
                [
                    'data'  => [
                        'idMembro' => '',
                        'nome' => '',
                        'cpf' => $request->cpf,
                        'instituicao' => '',
                        'titulacao' => '',
                        'categoria' => '',
                        'cargaHoraria' => ''
                    ],
                    'exibir' => true
                ];
        }
    }

    public function addMembro(Request $request)
    {
        $this->validate($request,[
            'nome_membro' => 'required|max:50',
            'cpf' => 'required|unique:PROJ_membros|max:16',
            'instituicao' => 'required|max:150',
            'titulacao_id' => 'exists:titulacaos,id',
            'categoria_id' => 'exists:categorias,id'
        ]);

        $membro = Membro::create($request->all());

        return
            [
                'data'  => [
                    'idMembro' => $membro->idMembro,
                    'nome' => $membro->nome_membro,
                    'cpf' => $membro->cpf,
                    'instituicao' => $membro->instituicao,
                    'titulacao_id' => $membro->titulacao_id,
                    'categoria_id' => $membro->categoria_id,
                    'cargaHoraria' => ''
                ],
                'exibir' => false
            ];
    }

    public function getGruposPesquisa()
    {
        return $grupos = Pesquisador::find(1)->grupoPesquisa;
    }
}
