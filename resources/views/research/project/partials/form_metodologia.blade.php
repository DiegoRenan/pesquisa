<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::label('metodologia', 'Metodologia') !!}
            {!! Form::textarea('metodologia', null, ['class' => 'publicacao form-control', 'v-model' => 'projeto.projeto.metodologia']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-5">
        <a class="btn btn-default btn-sm" href="#div4"><i class="glyphicon glyphicon-chevron-left"> Voltar</i></a>
    </div>

    <div class="col-sm-5">
        <buttom type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Salvar</buttom>
    </div>

    <div class="col-sm-2 text-right">
        <a class="btn btn-default btn-sm" href="#div6">Avançar <i class="glyphicon glyphicon-chevron-right"></i></a>
    </div>
</div>