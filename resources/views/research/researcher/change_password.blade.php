@extends('research.index')
@section('content')
    <div class="row">
        @include('research.partials.default_sidebar')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <div class="row">
                <div class="col-sm-11">
                    @include('errors.list')
                </div>
            </div>

            <div class="row">
                <div class="col-sm-11">
                    <legend><span class="glyphicon glyphicon-edit"></span> Alterar Senha</legend>
                </div>
            </div>

            {!! Form::open(['route' => ['researcher.password.update'], 'method' => 'PUT']) !!}

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        {!! Form::label('old_password', 'Senha Atual') !!}
                        {!! Form::input('password', 'old_password', null, ['class' => 'form-control', 'autofocus']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        {!! Form::label('password', 'Nova Senha') !!}
                        {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        {!! Form::label('password_confirmation', 'Repita a Nova Senha') !!}
                        {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> <strong>Alterar</strong></button>
                    </div>
                    <div class="col-sm-2 text-right">
                        <a class="btn btn-default" href="{{ route('researcher.index') }}"><strong>Cancelar</strong></a>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection