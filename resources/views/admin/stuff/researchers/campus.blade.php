@extends('app')
@section('content')
    @include('admin.partials.remover')
    <legend>Campus</legend>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span>
                </div>
                <div class="list-group">
                    @foreach($campuses as $campus)
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{ $campus->sigla }} - {{ $campus->name }}
                                </div>

                                <div class="col-sm-1">
                                    <a href="{{ route('admin.stuff.campus.edit', $campus->id) }}" class="btn btn-success" title="Editar categoria: {{ $campus->name }}"><span class="glyphicon glyphicon-edit"></span></a>
                                </div>

                                <div class="col-sm-1">
                                    {!! Form::open(['route' => ['admin.stuff.campus.destroy', $campus->id], 'method' => 'DELETE']) !!}
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#removerModal" data-title="Remover Categoria: {{ $campus->name }}" data-message="Você tem certeza que quer remover este campus?">
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
            @if(isset($campusUp))
                {!! Form::model($campusUp, ['route' => ['admin.stuff.campus.update', $campusUp->id], 'method' => 'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Editar Campus') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('sigla', 'Acronimo') !!}
                    {!! Form::text('sigla', null, ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> <strong>Atualizar</strong></button>
                    <a class="btn btn-info" href="{{ route('admin.stuff.campus.index') }}"><strong>Cancelar</strong></a>
                </div>
                {!! Form::close() !!}
            @else
                {!! Form::open(['route' => 'admin.stuff.campus.store', 'method' => 'POST']) !!}
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            {!! Form::label('name', 'Novo Campus') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::label('sigla', 'Acronimo') !!}
                            {!! Form::text('sigla', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
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