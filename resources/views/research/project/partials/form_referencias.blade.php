<div class="form-group">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('referencias', 'Referências') !!}
            {!! Form::textarea('referencias', null, ['class' => 'publicacao form-control', 'v-model' => 'projeto.referencias']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <a class="btn btn-default" href="#div8"><i class="glyphicon glyphicon-chevron-left"> Voltar</i></a>
        </div>

        <div class="col-sm-5">
            <buttom type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Salvar</buttom>
        </div>

        <div class="col-sm-2 text-right">
            <a class="btn btn-default" href="#div10">Avançar <i class="glyphicon glyphicon-chevron-right"></i></a>
        </div>
    </div>
</div>