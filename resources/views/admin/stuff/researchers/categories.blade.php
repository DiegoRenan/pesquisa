@extends('app')
@section('content')
    @include('admin.partials.remover')
    <legend>Categorias</legend>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span>
                </div>
                <div class="list-group">
                    @foreach($categories as $category)
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{ strtoupper($category->name) }}
                                </div>

                                <div class="col-sm-1">
                                    <a href="{{ route('admin.stuff.categories.edit', $category->id) }}" class="btn btn-success" title="Editar categoria: {{ strtoupper($category->name) }}"><span class="glyphicon glyphicon-edit"></span></a>
                                </div>

                                <div class="col-sm-1">
                                    {!! Form::open(['route' => ['admin.stuff.categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#removerModal" data-title="Remover Categoria: {{ strtoupper($category->name) }}" data-message="Você tem certeza que quer remover esta categoria?">
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
            @if(isset($categoryUp))
                {!! Form::model($categoryUp, ['route' => ['admin.stuff.categories.update', $categoryUp->id], 'method' => 'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nova Categoria') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> <strong>Atualizar</strong></button>
                    <a class="btn btn-info" href="{{ route('admin.stuff.categories.index') }}"><strong>Cancelar</strong></a>
                </div>
                {!! Form::close() !!}
            @else
                {!! Form::open(['route' => 'admin.stuff.categories.store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nova Categoria') !!}
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