@extends('app')
@section('content')
    <legend>Editar Usuário</legend>
    {!! Form::model($user, ['route' => ['admin.stuff.users.update', $user->id], 'method' => 'PUT']) !!}

        @include('admin.stuff.user.form',['padrao' => $user->roleId()])

        <div class="row">
            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> <strong>Atualizar</strong></button>
                </div>

                <div class="col-sm-2 text-right">
                    <a class="btn btn-default" href="{{ route('admin.stuff.users.index') }}"><strong>Cancelar</strong></a>
                </div>
            </div>
        </div>

    {!! Form::close() !!}
@endsection