@extends('app')
@section('content')
    @include('admin.partials.remover')
    <legend>Sub-Áreas CNPQ</legend>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span>
                </div>
                <div class="list-group">
                    @foreach($subareas as $subarea)
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{ $subarea->name }}
                                </div>

                                <div class="col-sm-1">
                                    <a href="{{ route('admin.stuff.subareacnpq.edit', $subarea->id) }}" class="btn btn-success" title="Editar categoria: {{ $subarea->name }}"><span class="glyphicon glyphicon-edit"></span></a>
                                </div>

                                <div class="col-sm-1">
                                    {!! Form::open(['route' => ['admin.stuff.subareacnpq.destroy', $subarea->id], 'method' => 'DELETE']) !!}
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#removerModal" data-title="Remover Categoria: {{ $subarea->name }}" data-message="Você tem certeza que quer remover este item?">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            @if(isset($subareaUp))
                {!! Form::model($subareaUp, ['route' => ['admin.stuff.subareacnpq.update', $subareaUp->id], 'method' => 'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Editar Sub-área CNPQ') !!}
                    {!! Form::select('area_id', $areas,  $subareaUp->area_id, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Nome Sub-área CNPQ') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> <strong>Atualizar</strong></button>
                    <a class="btn btn-info" href="{{ route('admin.stuff.areacnpq.index') }}"><strong>Cancelar</strong></a>
                </div>
                {!! Form::close() !!}
            @else
                {!! Form::open(['route' => 'admin.stuff.subareacnpq.store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nova Sub-área CNPQ') !!}
                    {!! Form::select('area_id', $areas, '', ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Nome Sub-área CNPQ') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> <strong>Cadastrar</strong></button>
                </div>
                {!! Form::close() !!}
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-right">
            <a class="btn btn-default" href="{{ route('admin.stuff.index') }}"><strong>Voltar</strong></a>
        </div>
    </div>

@endsection