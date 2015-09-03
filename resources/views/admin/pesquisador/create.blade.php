@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <legend><span class="glyphicon glyphicon-edit"></span> Cadastrar Pesquisador</legend>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.pesquisador.store', 'class' => 'form']) !!}
            @include('admin.pesquisador.partials.form', ['campus' => null])
            {!! Form::close() !!}
        </div>
    </div>
@endsection