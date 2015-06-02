@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <legend><span class="glyphicon glyphicon-edit"></span> Editar Edital</legend>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::model($edital,['method' => 'PUT', 'route' => ['edital.update', $edital->id], 'class' => 'form', 'files' => true]) !!}
            @include('admin.edital.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection