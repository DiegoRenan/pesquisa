@extends('app')
@section('content')
    @include('admin.partials.remover')
    <legend>Regimes de Trabalho</legend>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span>
                </div>
                <div class="list-group">
                    @foreach($works as $work)
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{ $work->name }}
                                </div>

                                <div class="col-sm-1">
                                    <a href="{{ route('admin.stuff.works.edit', $work->id) }}" class="btn btn-success" title="Editar categoria: {{ $work->name }}"><span class="glyphicon glyphicon-edit"></span></a>
                                </div>

                                <div class="col-sm-1">
                                    {!! Form::open(['route' => ['admin.stuff.works.destroy', $work->id], 'method' => 'DELETE']) !!}
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#removerModal" data-title="Remover Categoria: {{ $work->name }}" data-message="Você tem certeza que quer remover este item?">
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
            @if(isset($workUp))
                {!! Form::model($workUp, ['route' => ['admin.stuff.works.update', $workUp->id], 'method' => 'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Editar Regime de Trabalho') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> <strong>Atualizar</strong></button>
                    <a class="btn btn-info" href="{{ route('admin.stuff.works.index') }}"><strong>Cancelar</strong></a>
                </div>
                {!! Form::close() !!}
            @else
                {!! Form::open(['route' => 'admin.stuff.works.store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Novo Regime de Trabalho') !!}
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