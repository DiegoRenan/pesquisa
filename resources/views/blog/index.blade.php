@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-9">
            @include('blog.partials._timeline')
        </div>

        <div class="col-sm-3">
            @include('blog.partials._sidebar')
        </div>
    </div>
@endsection