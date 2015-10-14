<div class="form-group">
    {!! Form::label('titulo', 'Título Projeto') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control', 'v-model' => 'projeto.enquadramento.titulo']) !!}
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dataInicio', 'Data de Inicio') !!}
            {!! Form::input('date','dataInicio', null, ['class' => 'form-control', 'v-model' => 'projeto.enquadramento.dataInicio', 'v-on' => 'change:createFormCronograma($event, projeto.enquadramento.dataInicio, projeto.enquadramento.duracao)']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('duracao', 'Duração') !!}
            {!! Form::text('duracao', null, ['class' => 'form-control', 'v-model' => 'projeto.enquadramento.duracao', 'v-on' => 'change:createFormCronograma($event, projeto.enquadramento.dataInicio, projeto.enquadramento.duracao)']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('convenio', 'Algum Convenio? Qual?') !!}
            {!! Form::text('convenio', null, ['class' => 'form-control', 'v-model' => 'projeto.enquadramento.convenio']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('financiador', 'Possui algum tipo de financiamento? Qual?') !!}
            {!! Form::text('financiador', null, ['class' => 'form-control', 'v-model' => 'projeto.enquadramento.financiador']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('area', 'Área de Conhecimento') !!}
            {!! Form::select('area', [], null, ['class' => 'form-control', 'v-model' => 'projeto.enquadramento.area']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('subArea', 'Sub-Área de Conhecimento') !!}
            {!! Form::select('subArea', [], null, ['class' => 'form-control', 'v-model' => 'projeto.enquadramento.subArea']) !!}
        </div>

        <div class="col-sm-6">
            {!! Form::label('grupoPessquisa', 'Grupo de Pesquisa no DGP/CNPq') !!}
            <div class="row">
                <div class="col-sm-9">
                    {!! Form::select('grupoPesquisa', [], null, ['class' => 'form-control', 'v-model' => 'projeto.enquadramento.grupoPesquisa']) !!}
                </div>
                <div class="col-sm-3">
                    <buttom class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Novo Grupo</buttom>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('descricao', 'Descrição Sucinta do Projeto') !!} <small>(Máximo de 50 palavras)</small>
            {!! Form::textarea('descricao', null, ['class' => 'form-control', 'v-model' => 'projeto.enquadramento.descricao']) !!}
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="form-group">
                    {!! Form::label('palavra1', 'Palavra Chave') !!}
                    {!! Form::text('palavra1', null, ['class' => 'form-control', 'v-model' => 'projeto.enquadramento.palavra1']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    {!! Form::label('palavra2', 'Palavra Chave') !!}
                    {!! Form::text('palavra2', null, ['class' => 'form-control', 'v-model' => 'projeto.enquadramento.palavra2']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    {!! Form::label('palavra3', 'Palavra Chave') !!}
                    {!! Form::text('palavra3', null, ['class' => 'form-control', 'v-model' => 'projeto.enquadramento.palavra3']) !!}
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