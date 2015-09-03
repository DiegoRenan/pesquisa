@extends('app')
@section('content')
<legend>Cadastrar Usuário</legend>
{!! Form::open(['route' => 'admin.stuff.users.store', 'method' => 'POST']) !!}

    @include('admin.stuff.user.form',['padrao' => ''])

    <div class="row">
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> <strong>Cadastrar</strong></button>
            </div>

            <div class="col-sm-2 text-right">
                <a class="btn btn-default" href="{{ route('admin.stuff.users.index') }}"><strong>Cancelar</strong></a>
            </div>
        </div>
    </div>

{!! Form::close() !!}
@endsection