@extends('app')
@section('content')
    <div style="margin-left: 10%; margin-right: 10%;">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-1">
                        <h1 class="blog-post-title">
                            <span class="glyphicon glyphicon-file"></span>
                        </h1>
                    </div>
                    <div class="col-sm-11 text-center">
                        <h1>
                            {{ $doc->title }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <hr/>

        <div class="row">
            <div class="col-sm-12">
                <p class="blog-post-meta">Data de Publicação: {{ $doc->created_at->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <p class="blog-post-meta"><a href="{{  route('document.download', $doc->id) }}">Download: <span class="glyphicon glyphicon-file"></span></a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                {!! $doc->text !!}
            </div>
        </div>
    </div>
@endsection