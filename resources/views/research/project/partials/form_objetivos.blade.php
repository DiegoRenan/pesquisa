<div class="form-group">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('objetivos', 'Objetivos') !!}
            {!! Form::textarea('objetivos', null, ['class' => 'publicacao form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <a class="btn btn-default" href="#div3"><i class="glyphicon glyphicon-chevron-left"> Voltar</i></a>
        </div>

        <div class="col-sm-5">
            <buttom type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Salvar</buttom>
        </div>

        <div class="col-sm-2 text-right">
            <a class="btn btn-default" href="#div5">Avançar <i class="glyphicon glyphicon-chevron-right"></i></a>
        </div>
    </div>
</div>