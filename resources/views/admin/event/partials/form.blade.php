<div class="form-group">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'autofocus']) !!}
</div>

<div class="form-group">
    {!! Form::label('start', 'Data inicio:') !!}
    {!! Form::input('date', 'start', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('end', 'Data fim:') !!}
    {!! Form::input('date', 'end', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            {!! Form::label('hour', 'Hora:') !!}
            {!! Form::input('time', 'hour', time('H:i:s'), ['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('alltime', 'Integral:') !!}<br>
            {!! Form::checkbox('alltime', true, false) !!}
            <span class="label label-default">Marque estão opção para horário integral e descosindere a hora!</span>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('place', 'Local:') !!}
    {!! Form::text('place', null, ['class' => 'form-control']) !!}
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
            <a class="btn btn-default" href="{{ route('event.index') }}"><strong>Cancelar</strong></a>
        </div>
    </div>
</div>