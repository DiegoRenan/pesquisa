<div class="form-group">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'autofocus', '']) !!}
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
    {!! Form::label('started_at', 'Data de inicio:') !!}
    {!! Form::input('date', 'started_at', date('d/m/Y'), ['class'=>'form-control', '']) !!}
</div>
<div class="form-group">
    {!! Form::label('finished_at', 'Data de fechamento:') !!}
    {!! Form::input('date', 'finished_at', date('d/m/Y'), ['class'=>'form-control', '']) !!}
</div>
<div class="form-group">
    {!! Form::label('file', 'Arquivo:') !!}
    {!! Form::file('file', null, ['class'=>'form-control', '']) !!}
</div>
<div class="form-group">
    {!! Form::label('text', 'Conteúdo:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> <strong>Salvar</strong></button>
        </div>
        <div class="col-sm-2 text-right">
            <a class="btn btn-default" href="{{ route('edital.index') }}"><strong>Cancelar</strong></a>
        </div>
    </div>
</div>