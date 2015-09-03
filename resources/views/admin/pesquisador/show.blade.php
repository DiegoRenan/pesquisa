@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <legend><span class="glyphicon glyphicon-info-sign"></span> Informações do Pesquisador</legend>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <span  class="glyphicon glyphicon-info-sign"></span> Dados do Pesquisador
                </div>
                <div class="panel-body">
                    <strong>Nome:</strong> {{ $pesquisador->nome }}<br/>
                    <strong>Matricula:</strong> {{ $pesquisador->matricula }}<br/>
                    <strong>CPF:</strong> {{ $pesquisador->cpf }}<br/>
                    <strong>RG:</strong> {{ $pesquisador->rg }}<br/>
                    <strong>Data Nascimento:</strong> {{ $pesquisador->dt_nascimento }}<br/>
                    <strong>Link Lattes:</strong> <a href="{{ $pesquisador->link_lattes }}">{{ $pesquisador->link_lattes }}</a><br/>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <span  class="glyphicon glyphicon-phone-alt"></span> Informações de Contatos
                </div>
                <div class="panel-body">
                    <strong>E-mail:</strong> {{ $pesquisador->email }}<br/>
                    <strong>Telefone:</strong> {{ $pesquisador->telefone }}<br/>
                    <strong>Fax:</strong> {{ $pesquisador->fax }}<br/>
                    <strong>Celular:</strong> {{ $pesquisador->celular }}<br/>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-11">
            <a class="btn btn-success" href="{{ route('admin.pesquisador.edit', $pesquisador->id) }}"><strong><span class="glyphicon glyphicon-edit"></span> Editar</strong></a>
        </div>
        <div class="col-sm-1 text-right">
            <a class="btn btn-default" href="{{ route('admin.pesquisador.index') }}"><strong>Voltar</strong></a>
        </div>
    </div>
@endsection