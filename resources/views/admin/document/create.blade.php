@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <legend><span class="glyphicon glyphicon-edit"></span> Cadastrar Documento</legend>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::open(['method' => 'POST', 'route' => 'document.store', 'class' => 'form', 'files' => true]) !!}
            @include('admin.document.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection