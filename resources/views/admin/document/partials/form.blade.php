<div class="form-group">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'autofocus', '']) !!}
</div>
<div class="form-group">
    {!! Form::label('file', 'Arquivo:') !!}
    {!! Form::file('file', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content', 'Conteúdo:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> <strong>Salvar</strong></button>
        </div>
        <div class="col-sm-2 text-right">
            <a class="btn btn-default" href="{{ route('document.index') }}"><strong>Cancelar</strong></a>
        </div>
    </div>
</div>