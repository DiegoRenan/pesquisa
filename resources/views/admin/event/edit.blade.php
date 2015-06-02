@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <legend><span class="glyphicon glyphicon-edit"></span> Editar Evento</legend>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::model($event,['method' => 'PUT', 'route' => ['event.update', $event->id], 'class' => 'form']) !!}
            @include('admin.event.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection