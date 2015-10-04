@extends('research.project.create')
@section('form')

    <ol class="breadcrumb">
        <li class="active"><small>Dados Pessoais</small></li>
        <li><a href="#"><small>Enquadramento</small></a></li>
        <li><a href="#"><small>Caracterização</small></a></li>
        <li><a href="#"><small>Objetivos</small></a></li>
        <li><a href="#"><small>Metodologia</small></a></li>
        <li><a href="#"><small>Equipe</small></a></li>
        <li><a href="#"><small>Orçamento</small></a></li>
        <li><a href="#"><small>Cronograma</small></a></li>
        <li><a href="#"><small>Referências</small></a></li>
        <li><a href="#"><small>Anexos</small></a></li>
        <li><a href="#"><small>Revisão</small></a></li>
    </ol>

    <div class="well well-sm"><small>Os dados deste formulário não podem ser modificados! Se algum dado estiver incorreto vá para a edição de dados!
            <a href="{{ route('researcher.researcher.edit', Auth::user()->id) }}">Clique aqui</a> para editar seus dados</small></div>

    {!! Form::open() !!}

    <div class="form-group">
        <div class="row">
            <div class="col-sm-8">
                {!! Form::label('nome', 'Nome Completo') !!}
                {!! Form::text('nome', null, ['class' => 'form-control', 'readOnly', 'v-model' => 'projeto.dadosPessoais.nome']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('matricula', 'Matrícula SIAPE') !!}
                {!! Form::text('matricula', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-4">
                {!! Form::label('cpf', 'CPF') !!}
                {!! Form::text('cpf', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('rg', 'RG') !!}
                {!! Form::text('rg', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('dataNasc', 'Data Nascimento') !!}
                {!! Form::text('dataNasc', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-4">
                {!! Form::label('rua', 'Rua') !!}
                {!! Form::text('rua', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('numero', 'Numero') !!}
                {!! Form::text('numero', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('complemento', 'Complemento') !!}
                {!! Form::text('complemento', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-4">
                {!! Form::label('bairro', 'Bairro') !!}
                {!! Form::text('bairro', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('cidade', 'Cidade') !!}
                {!! Form::text('cidade', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
            <div class="col-sm-1">
                {!! Form::label('uf', 'UF') !!}
                {!! Form::text('uf', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('cep', 'CEP') !!}
                {!! Form::text('cep', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-4">
                {!! Form::label('fone', 'Fone') !!}
                {!! Form::text('fone', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('celular', 'Celular') !!}
                {!! Form::text('celular', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('fax', 'Fax') !!}
                {!! Form::text('fax', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-4">
                {!! Form::label('email', 'E-mail') !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('categoria', 'Categoria') !!}
                {!! Form::text('categoria', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('titulacao', 'Maior Titulação') !!}
                {!! Form::text('titulacao', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('unidade', 'Unidade') !!} <small>(Departamento/Instituto/Faculdade)</small>
                {!! Form::text('unidade', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('fone', 'Fone') !!}
                {!! Form::text('fone', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('regime', 'Regime de Trabalho') !!}
                {!! Form::text('regime', null, ['class' => 'form-control', 'readOnly']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5">
            <a class="btn btn-default" href="#"><i class="glyphicon glyphicon-chevron-left"></i> Voltar</a>
        </div>

        <div class="col-sm-5">
            <buttom type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Salvar</buttom>
        </div>

        <div class="col-sm-2 text-right">
            <a class="btn btn-default" href="#">Avançar <i class="glyphicon glyphicon-chevron-right"></i></a>
        </div>
    </div>

    {!! Form::close() !!}

@endsection
@stop