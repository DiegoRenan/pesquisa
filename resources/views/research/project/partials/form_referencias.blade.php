<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::label('referencias', 'Referências') !!}
            {!! Form::textarea('referencias', null, ['class' => 'publicacao form-control', 'v-model' => 'projeto.projeto.referencias']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-5">
        <a class="btn btn-default btn-sm" href="#div8"><i class="glyphicon glyphicon-chevron-left"> Voltar</i></a>
    </div>

    <div class="col-sm-5">
        <buttom type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Salvar</buttom>
    </div>

    <div class="col-sm-2 text-right">
        <a class="btn btn-default btn-sm" href="#div10">Avançar <i class="glyphicon glyphicon-chevron-right"></i></a>
    </div>
</div>