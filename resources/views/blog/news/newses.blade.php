@extends('app')
@section('content')
    <div class="row">
        @if(count($newses))
            @foreach($newses as $news)
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
                    <hr/>
                </div>
            @endforeach
        @else
            <div class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span> <strong>Não há notícias cadastradas!</strong></div>
        @endif
    </div>
@endsection