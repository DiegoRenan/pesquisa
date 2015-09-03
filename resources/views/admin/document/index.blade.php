@extends('app')
@section('content')
    @include('admin.partials.remover')
    <div class="row">
        <div class="col-sm-12">
            @if(count($docs))
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Documentos</h3>
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
                        @foreach($docs as $doc)
                            <tr>
                                <td>
                                    {{ $doc->title }}
                                </td>
                                <td>
                                    {{ $doc->created_at->format('d/m/Y') }}
                                </td>
                                <td>
                                    {{ $doc->user->name }}
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('document.show', $doc->id) }}" title="Visualizar documento: {{ $doc->title }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('document.edit', $doc->id) }}" title="Editar documento: {{ $doc->title }}"><span class="glyphicon glyphicon-edit"></span></a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'delete', 'route' => ['document.delete', $doc->id]]) !!}
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#removerModal" data-title="Remover Documentos" data-message="Você tem certeza que quer remover este item?">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" style="text-align: center;">{!! $docs->render() !!}</td>
                        </tr>
                        </tbody>
                    </table>
            </div>
            @else
                <div class="alert alert-info"><strong>Ainda não há editais cadastradas!</strong></div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <a class="btn btn-primary" href="{{ route('document.create') }}"><span class="glyphicon glyphicon-plus"></span> <strong>Novo Documento</strong></a>
        </div>
        <div class="col-sm-2 text-right">
            <a class="btn btn-default" href="{{ route('admin.index') }}"><strong>Voltar</strong></a>
        </div>
    </div>
@endsection