<div class="form-group">
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            {!! Form::label('matricula', 'Matricula') !!}
            {!! Form::text('matricula', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('cpf', 'CPF') !!}
            {!! Form::text('cpf', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
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
        <div class="col-sm-8">
            {!! Form::label('link_lattes', 'Link Lattes') !!}
            {!! Form::url('link_lattes', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            {!! Form::label('campus_id', 'Campus') !!}
            {!! Form::select('campus_id', $campi, $campus, ['class' => 'form-control', 'required']) !!}
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
        <div class="col-sm-10">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> <strong>Salvar</strong></button>
        </div>
        <div class="col-sm-2 text-right">
            <a class="btn btn-default" href="{{ route('admin.pesquisador.index') }}"><strong>Cancelar</strong></a>
        </div>
    </div>
</div>

