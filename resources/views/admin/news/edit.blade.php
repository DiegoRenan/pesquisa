@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <legend><span class="glyphicon glyphicon-edit"></span> Cadastrar Notícia</legend>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::model($news, ['method' => 'PUT', 'route' => ['news.update', $news->id], 'class' => 'form']) !!}
            @include('admin.news.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection