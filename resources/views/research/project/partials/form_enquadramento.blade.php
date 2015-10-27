<div class="form-group">
    {!! Form::label('titulo', 'Título Projeto') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control', 'v-model' => 'projeto.projeto.titulo']) !!}
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dataInicio', 'Data de Inicio') !!}
            {!! Form::input('date','dataInicio', null, ['class' => 'form-control', 'v-model' => 'projeto.projetoDatas.dataInicio', 'v-on' => 'change:createFormCronograma($event, projeto.projetoDatas.dataInicio, projeto.projetoDatas.duracao)']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('duracao', 'Duração') !!}
            {!! Form::select('duracao', $duracao, null, ['class' => 'form-control', 'v-model' => 'projeto.projetoDatas.duracao', 'v-on' => 'change:createFormCronograma($event, projeto.projetoDatas.dataInicio, projeto.projetoDatas.duracao)']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('convenio', 'Algum Convenio? Qual?') !!}
            {!! Form::text('convenio', null, ['class' => 'form-control', 'v-model' => 'projeto.projeto.convenio_id']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('financiador', 'Possui algum tipo de financiamento? Qual?') !!}
            {!! Form::text('financiador', null, ['class' => 'form-control', 'v-model' => 'projeto.projeto.financiador_id']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('area', 'Área de Conhecimento') !!}
            {!! Form::select('area', $area, null, ['class' => 'form-control', 'v-model' => 'projeto.projeto.area_id']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('subArea', 'Sub-Área de Conhecimento') !!}
            {!! Form::select('subArea', $subArea, null, ['class' => 'form-control', 'v-model' => 'projeto.projeto.subAreaConhecimento_id']) !!}
        </div>

        <div class="col-sm-6">
            {!! Form::label('grupoPessquisa', 'Grupo de Pesquisa no DGP/CNPq') !!}
            <div class="row">
                <div class="col-sm-9">
                    {!! Form::select('grupoPesquisa', [], null, ['class' => 'form-control', 'v-model' => 'projeto.projeto.grupoPesquisa_id']) !!}
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
            {!! Form::textarea('descricao', null, ['class' => 'form-control', 'v-model' => 'projeto.projeto.descricao']) !!}
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="form-group">
                    {!! Form::label('palavra1', 'Palavra Chave') !!}
                    {!! Form::text('palavra1', null, ['class' => 'form-control', 'v-model' => 'projeto.palavrasChave.palavra1']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    {!! Form::label('palavra2', 'Palavra Chave') !!}
                    {!! Form::text('palavra2', null, ['class' => 'form-control', 'v-model' => 'projeto.palavrasChave.palavra2']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    {!! Form::label('palavra3', 'Palavra Chave') !!}
                    {!! Form::text('palavra3', null, ['class' => 'form-control', 'v-model' => 'projeto.palavrasChave.palavra3']) !!}
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
        <buttom type="submit" class="btn btn-success" v-on="click:doPost"><i class="glyphicon glyphicon-save"></i> Salvar</buttom>
    </div>

    <div class="col-sm-2 text-right">
        <a class="btn btn-default" href="#div3">Avançar <i class="glyphicon glyphicon-chevron-right"></i></a>
    </div>
</div>