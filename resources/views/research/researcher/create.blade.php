@extends('app')
@section('content')
    <div class="row">

        <div class="row">
            <div class="col-sm-11">
                <legend><span class="glyphicon glyphicon-edit"></span> Cadastro de Pesquisador</legend>
            </div>
        </div>

        {!! Form::open(['route' => ['researcher.researcher.store'], 'method' => 'POST']) !!}

        <div class="form-group">
            <div class="row">
                <div class="col-sm-11">
                    {!! Form::label('nome', 'Nome') !!}
                    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-3">
                    {!! Form::label('matricula', 'Matricula') !!}
                    {!! Form::text('matricula', null, ['class' => 'form-control']) !!}
                </div>

                <div class="col-sm-4">
                    {!! Form::label('cpf', 'CPF') !!}
                    {!! Form::text('cpf', null, ['class' => 'form-control']) !!}
                </div>

                <div class="col-sm-4">
                    {!! Form::label('rg', 'RG') !!}
                    {!! Form::text('rg', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-3">
                    {!! Form::label('dt_nascimento', 'Data Nascimento') !!}
                    {!! Form::input('date', 'dt_nascimento', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-3">
                    {!! Form::label('titulacao_id', 'Titulação') !!}
                    {!! Form::select('titulacao_id', $titles, null, ['class' => 'form-control']) !!}
                </div>

                <div class="col-sm-4">
                    {!! Form::label('categoria_id', 'Categoria') !!}
                    {!! Form::select('categoria_id', $categories, null, ['class' => 'form-control']) !!}
                </div>

                <div class="col-sm-4">
                    {!! Form::label('regime_trabalho_id', 'Regime de trabalho') !!}
                    {!! Form::select('regime_trabalho_id', $works, null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-7">
                    {!! Form::label('email', 'E-mail') !!}
                    {!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-3">
                    {!! Form::label('telefone', 'Telefone') !!}
                    {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
                </div>

                <div class="col-sm-4">
                    {!! Form::label('fax', 'Fax') !!}
                    {!! Form::text('fax', null, ['class' => 'form-control']) !!}
                </div>

                <div class="col-sm-4">
                    {!! Form::label('celular', 'Celular') !!}
                    {!! Form::text('celular', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-7">
                    {!! Form::label('link_lattes', 'Link Lattes') !!}
                    {!! Form::input('url', 'link_lattes', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-3">
                    {!! Form::label('campus_id', 'Campus') !!}
                    {!! Form::select('campus_id', $campi, null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="col-sm-3" id="instituto">
                    {!! Form::label('instituto_id', 'Instituto') !!}
                    {!! Form::select('instituto_id', [], null, ['class' => 'form-control']) !!}
                </div>

                <div class="col-sm-1" id="instituto">
                    <strong>OU</strong>
                </div>

                <div class="col-sm-4" id="departamento">
                    {!! Form::label('departamento_id', 'Departamento') !!}
                    {!! Form::select('departamento_id', [], null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> <strong>Salvar</strong></button>
                </div>
                <div class="col-sm-2 text-right">
                    <a class="btn btn-default" href="{{ route('blog.index') }}"><strong>Cancelar</strong></a>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@endsection