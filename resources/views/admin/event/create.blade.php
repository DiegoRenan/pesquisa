@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <legend><span class="glyphicon glyphicon-edit"></span> Cadastrar Evento</legend>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::open(['method' => 'POST', 'route' => 'event.store', 'class' => 'form']) !!}
            @include('admin.event.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection