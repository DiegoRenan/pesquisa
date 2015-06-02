@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <legend><span class="glyphicon glyphicon-edit"></span> Editar Documento</legend>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::model($doc,['method' => 'PUT', 'route' => ['document.update', $doc->id], 'class' => 'form', 'files' => true]) !!}
            @include('admin.document.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection