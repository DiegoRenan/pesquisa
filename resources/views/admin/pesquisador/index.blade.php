@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if(count($pesquisadores))
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Pesquisadores</h3>
                    </div>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <td>
                                <strong>Matricula</strong>
                            </td>
                            <td>
                                <strong>Nome</strong>
                            </td>
                            <td>
                                <strong>Instituto / Departamento</strong>
                            </td>
                            <td colspan="2">
                                <strong>Link Lattes</strong>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($pesquisadores as $pesquisador)
                                <tr>
                                    <td>
                                        {{ $pesquisador->matricula }}
                                    </td>
                                    <td>
                                        {{ $pesquisador->nome }}
                                    </td>
                                    <td>
                                        {{ $pesquisador->instituto->sigla or $pesquisador->departamento->name }} - {{ $pesquisador->instituto->campus->sigla or $pesquisador->departamento->campus->sigla }}
                                    </td>
                                    <td>
                                        <a href="{{ $pesquisador->link_lattes }}">Link Lattes</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.pesquisador.show', $pesquisador->id) }}" title="Visualizar pesquisador: {{ $pesquisador->nome }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info"><strong>Ainda não há pesquisadores cadastrados!</strong></div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <a class="btn btn-primary" href="{{ route('admin.pesquisador.create') }}"><span class="glyphicon glyphicon-plus"></span> <strong>Novo Pesquisador</strong></a>
        </div>
        <div class="col-sm-2 text-right">
            <a class="btn btn-default" href="{{ route('admin.index') }}"><strong>Voltar</strong></a>
        </div>
    </div>
@endsection