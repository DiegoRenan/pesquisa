@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <legend><span class="glyphicon glyphicon-edit"></span> Cadastrar Notícia</legend>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::open(['method' => 'POST', 'route' => 'news.store', 'class' => 'form']) !!}
            @include('admin.news.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection