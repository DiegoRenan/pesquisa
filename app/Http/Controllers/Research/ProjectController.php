<?php namespace App\Http\Controllers\Research;

use App\Gestao\Anexos;
use App\Gestao\Convenio;
use App\Gestao\Cronograma;
use App\Gestao\CronogramaAno;
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

	/*
	 * REFATORAR
	*/

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

    public function edit($id)
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

    public function getDados($id=null)
    {
    	//sleep(5);
        if(!$id) {
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
                    'caracterizacao' => '',
                    'objetivos' => '',
                    'metodologia' => '',
                    'referencias' => '',
                    'convenio_id' => '1',
                    'financiador_id' => '1',
                    'area_id' => '',
                    'subAreaConhecimento_id' => '',
                    'grupoPesquisa_id' => '1',
                    'pesquisador_id' => 1,
                ],
                'projetoDatas' => [
                    'dataInicio' => Carbon::now()->format('Y-m-d'),
                    'duracao' => '24',
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
        }
        else {
            $projeto = Projeto::findOrFail($id);
            $palavrasChave = $projeto->palavrasChave()->get()->toArray();
            $projetoDatas = $projeto->projetoDatas()->get()->toArray();
            $orcamento = $projeto->orcamento()->get()->first();
            $anexos = $projeto->anexos()->get()->toArray();


            $json = [
                'idProjeto' => $projeto->idProjeto,
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
                    'titulo' => $projeto->titulo,
                    'descricao' => $projeto->descricao,
                    'caracterizacao' => $projeto->caracterizacao,
                    'objetivos' => $projeto->objetivos,
                    'metodologia' => $projeto->metodologia,
                    'referencias' => $projeto->referencias,
                    'convenio_id' => $projeto->convenio_id,
                    'financiador_id' => $projeto->financiador_id,
                    'area_id' => 1, /*PEGAR ID AREA*/
                    'subAreaConhecimento_id' => $projeto->subAreaConhecimento_id,
                    'grupoPesquisa_id' => $projeto->grupoPesquisa_id,
                    'pesquisador_id' => 1,
                ],
                'projetoDatas' => [
                    'dataInicio' => $projetoDatas[0]['dataInicio'],
                    'duracao' => $projetoDatas[0]['duracao']
                ],
                'palavrasChave' => [
                    'palavra1' => $palavrasChave[0]['palavra'],
                    'palavra2' => $palavrasChave[1]['palavra'],
                    'palavra3' => $palavrasChave[2]['palavra']
                ],
                'membros' => [],
                'orcamento' => [
                    'materialConsumo' => $orcamento->materialConsumo,
                    'servicosPessoaFisica' => $orcamento->servicosPessoaFisica,
                    'servicosPessoaJuridica' => $orcamento->servicosPessoaJuridica,
                    'obrasInstalacoes' => $orcamento->obrasInstalacoes,
                    'equipamentoMaterial' => $orcamento->equipamentoMaterial,
                    'total' => ''
                ],
                'cronograma' => [],
                'anexos' => $anexos
            ];
        }

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

        /* Validação dos dados do formulario de enquadramento */
        $this->validate($request, [
            'projeto.titulo' => 'required',
            'projeto.descricao' => 'required',
            'projeto.convenio_id' => 'required',
            'projeto.financiador_id' => 'required',
            'projeto.area_id' => 'required',
            'projeto.subAreaConhecimento_id' => 'required',
            'projeto.grupoPesquisa_id' => 'required',
            'projetoDatas.dataInicio' => 'required',
            'projetoDatas.duracao' => 'required',
            'palavrasChave.palavra1' => 'required',
            'palavrasChave.palavra2' => 'required',
            'palavrasChave.palavra3' => 'required'
        ]);

        /*Se o json possuir o idProjeto: então projeto já existe, logo é feito atualização dos dados
        * Se o idProjeto for null: entã será criado novo projeto
        */
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
            if(count($membros) > 0) {
                $members = [];
                foreach($membros as $mb) {
                    $members[$mb['idMembro']] = array('cargaHoraria' => $mb['cargaHoraria']);
                }
                $proj->membros()->sync($members);
            }

            /* Salvando Orcamento */
            $orc = new Orcamento($orcamento);
            $proj->orcamento()->save($orc);

            /* Salvando Cronograma */
            foreach($cronograma as $cr) {
                $at = new Cronograma(['atividade' => $cr['nome']]);
                $proj->cronograma()->save($at);

                foreach($cr['anos'] as $anos) {
                    $anoMeses = $anos['ano'].''.$anos['meses'];
                    $at->atividade()->save(new CronogramaAno(['anoMeses' => $anoMeses]));
                }
            }
        }
        $json['idProjeto'] = $proj->idProjeto;
        return response()->json($json);
    }

    public function getSubAreas()
    {
        return SubAreaCnpq::all();
    }

    public function getConvenios()
    {
        return Convenio::all();
    }

    public function anexosUpload(Request $request)
    {
        $file = $request->file('documento');

        $fileExtension = strtolower($file->getClientOriginalExtension());

        $extensions = ['txt', 'doc', 'docx', 'pdf', 'odt'];
        if(!in_array($fileExtension, $extensions))
            abort(500);


        $pesquisador = Pesquisador::findOrFail($request['userId'])->cpf;

        $projeto = Projeto::findOrFail($request['projetoId']);

        $storagePath = storage_path().'/projetos/'.$pesquisador.'/'.$projeto->idProjeto.'/anexos/';

        $fileName = $file->getClientOriginalName();

        $truePath = $file->move($storagePath, $fileName);

        /*SALVAR NO BD*/
        $anexo = new Anexos(['nome' => $fileName, 'arquivo' => $truePath]);
        $anexo = $projeto->anexos()->save($anexo);

        return response()->json($anexo);
    }

    public function anexosDelete($id)
    {
        $anexo = Anexos::findOrFail($id);
        unlink($anexo->arquivo);
        $anexo->delete();
        return;
    }
}
