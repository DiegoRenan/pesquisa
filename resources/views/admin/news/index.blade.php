@extends('app')
@section('content')
    @include('admin.partials.remover')
    <div class="row">
        <div class="col-sm-12">
            @if(count($news))
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Notícias</h3>
                    </div>
                    <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <td>
                                        <strong>Título</strong>
                                    </td>
                                    <td>
                                        <strong>Data de Publicação</strong>
                                    </td>
                                    <td colspan="6">
                                        <strong>Autor</strong>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $not)
                                <tr>
                                    <td>
                                        {{ $not->title }}
                                    </td>
                                    <td>
                                        {{ $not->news->publicated_at->format('d - m - Y') }}
                                    </td>
                                    <td>
                                        {{ $not->user->name or "ERROR" }}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('news.show', $not->id) }}" title="Visualizar notícia: {{ $not->title }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('news.edit', $not->id) }}" title="Editar notícia: {{ $not->title }}"><span class="glyphicon glyphicon-edit"></span></a>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'delete', 'route' => ['news.delete', $not->id]]) !!}
                                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#removerModal" data-title="Remover Notícias" data-message="Você tem certeza que quer remover este item?">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            @else
                <div class="alert alert-info"><strong>Ainda não há notícias cadastradas!</strong></div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <a class="btn btn-primary" href="{{ route('news.create') }}"><span class="glyphicon glyphicon-plus"></span> <strong>Nova Notícia</strong></a>
        </div>
        <div class="col-sm-2 text-right">
            <a class="btn btn-default" href="{{ route('admin.index') }}"><strong>Voltar</strong></a>
        </div>
    </div>
@endsection