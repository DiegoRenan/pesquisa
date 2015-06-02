@extends('app')
@section('content')
    <div style="margin-left: 10%; margin-right: 10%;">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-1">
                        <h1 class="blog-post-title">
                            <span class="glyphicon glyphicon-bullhorn"></span>
                        </h1>
                    </div>
                    <div class="col-sm-11 text-center">
                        <h1>
                            {{ $news->title }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-sm-12">
                <p class="blog-post-meta">Data de Publicação: {{ $news->publicated_at->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <p class="blog-post-meta">Fonte: <a href="{{ $news->url}}">{{ $news->source }}</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                {!! $news->content !!}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-right">
                <a class="btn btn-default" href="{{ route('news.index') }}"><strong>Voltar</strong></a>
            </div>
        </div>
    </div>

@endsection