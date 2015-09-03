@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <legend><span class="glyphicon glyphicon-edit"></span> Editar Pesquisador</legend>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::model($pesquisador, ['method' => 'PUT', 'route' => ['admin.pesquisador.update', $pesquisador->id], 'class' => 'form']) !!}
            @include('admin.pesquisador.partials.form', ['campus' => $pesquisador->getCampusID()])
            {!! Form::close() !!}
        </div>
    </div>
@endsection