@extends('app')
@section('content')
    @include('admin.partials.remover')
    <legend>Usuários</legend>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span>
                </div>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <td>
                                <strong>Nome</strong>
                            </td>
                            <td>
                                <strong>Categoria</strong>
                            </td>
                            <td colspan="2">
                                <strong>Açôes</strong>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ strtoupper($user->roleName()) }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.stuff.users.edit', $user->id) }}" class="btn btn-success" title="Editar usuário: {{ strtoupper($user->name) }}"><span class="glyphicon glyphicon-edit"></span></a>
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['admin.stuff.users.destroy', $user->id], 'method' => 'DELETE']) !!}
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#removerModal" data-title="Remover usuário: {{ strtoupper($user->name) }}" data-message="Você tem certeza que quer remover este usuário?" title="Remover usuário: {{ strtoupper($user->name) }}">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <a class="btn btn-primary" href="{{ route('admin.stuff.users.create') }}"><strong>Novo Usuário</strong></a>
        </div>

        <div class="col-sm-2 text-right">
            <a class="btn btn-default" href="{{ route('admin.stuff.index') }}"><strong>Voltar</strong></a>
        </div>
    </div>

@endsection