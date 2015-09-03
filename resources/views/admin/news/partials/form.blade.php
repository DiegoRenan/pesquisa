<div class="form-group">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('source', 'Fonte:') !!}
    {!! Form::text('source', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('url', 'Link:') !!}
    {!! Form::url('url', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('publicated_at', 'Data de publicação:') !!}
    {!! Form::input('date', 'publicated_at', null, ['class'=>'form-control', 'required']) !!}
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
            <a class="btn btn-default" href="{{ route('news.index') }}"><strong>Cancelar</strong></a>
        </div>
    </div>
</div>