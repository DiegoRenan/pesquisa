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
                            {{ $edital->title }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <hr/>

        <div class="row">
            <div class="col-sm-12">
                <p class="blog-post-meta">Data de Publicação: {{ $edital->created_at->format('d/m/Y') }}</p>
                <p class="blog-post-meta">Fonte: <a href="{{ $edital->url}}">{{ $edital->source }}</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <p class="blog-post-meta">Data de Início: {{ $edital->edital->started_at->format('d/m/Y') }}</p>
            </div>
            <div class="col-sm-6">
                <p class="blog-post-meta">Data de Fechamento: {{ $edital->edital->finished_at->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <p class="blog-post-meta"><a href="{{  route('edital.download', $edital->id) }}">Download: <span class="glyphicon glyphicon-file"></span></a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                {!! $edital->text !!}
            </div>
        </div>
    </div>
@endsection