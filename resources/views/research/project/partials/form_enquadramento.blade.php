<ol class="breadcrumb">
    <li><a href="#"><small>Dados Pessoais</small></a></li>
    <li class="active"><small>Enquadramento</small></li>
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

<div class="form-group">
    {!! Form::label('titulo', 'Titulo Projeto') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
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