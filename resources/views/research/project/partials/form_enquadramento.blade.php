<div class="form-group">
    {!! Form::label('titulo', 'Titulo Projeto') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control', 'autofocus']) !!}
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dataInicio', 'Mês Inicio') !!}
            {!! Form::select('dataInicio', [], null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('dataInicio', 'Ano Inicio') !!}
            {!! Form::select('dataInicio', [], null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('dataInicio', 'Duração') !!}
            {!! Form::text('dataInicio', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('convenio', 'Algum Convenio? Qual?') !!}
            {!! Form::text('convenio', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('financiador', 'Possui algum tipo de financiamento? Qual?') !!}
            {!! Form::text('financiador', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('area', 'Área de Conhecimento') !!}
            {!! Form::select('area', [], null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('subArea', 'Sub-Área de Conhecimento') !!}
            {!! Form::select('subArea', [], null, ['class' => 'form-control']) !!}
        </div>

        <div class="col-sm-5">
            {!! Form::label('grupoPessquisa', 'Grupo de Pesquisa no DGP/CNPq') !!}
            <div class="row">
                <div class="col-sm-10">
                    {!! Form::select('grupoPessquisa', [], null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-2">
                    <buttom class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Adicionar Grupo</buttom>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('descricao', 'Descrição Sucinta do Projeto') !!} <small>(Máximo de 50 palavras)</small>
            {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="form-group">
                    {!! Form::label('palavra1', 'Palavra Chave') !!}
                    {!! Form::text('palavra1', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    {!! Form::label('palavra1', 'Palavra Chave') !!}
                    {!! Form::text('palavra1', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    {!! Form::label('palavra1', 'Palavra Chave') !!}
                    {!! Form::text('palavra1', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-5">
        <a class="btn btn-default" href="#div1"><i class="glyphicon glyphicon-chevron-left"> Voltar</i></a>
    </div>

    <div class="col-sm-5">
        <buttom type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Salvar</buttom>
    </div>

    <div class="col-sm-2 text-right">
        <a class="btn btn-default" href="#div3">Avançar <i class="glyphicon glyphicon-chevron-right"></i></a>
    </div>
</div>