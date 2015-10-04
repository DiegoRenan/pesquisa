@extends('app')
@section('content')
    <div class="publicacao">
        <div class="row">
            <div class="col-md-9">
                <div class="row"><div class="col-sm-12"><h3>{{ $edital->title }}</h3></div></div>
                <div class="publicacao-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <small>
                                    <i class="glyphicon glyphicon-info-sign"></i> Publicado por {{ $edital->present()->publicadoCompleto }}
                                    <i class="glyphicon glyphicon-link"></i> Fonte: <a href="{{ $edital->url}}">{{ $edital->source }}</a>
                                </small>
                            </p>
                        </div>
                    </div>
                    <div class="row"><div class="col-sm-12"><p>{!! $edital->content !!}</p></div></div>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="blog-post-meta"><strong>Data de Início:</strong> {{ $edital->edital->started_at->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-sm-4">
                            <p class="blog-post-meta"><strong>Data de Fechamento:</strong> {{ $edital->edital->finished_at->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-sm-4">
                            <p class="blog-post-meta"><a href="{{  route('edital.download', $edital->id) }}"><span class="glyphicon glyphicon-download-alt"></span> Baixar Arquivo</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1">
                            <a class="btn btn-default btn-xs" href="{{ URL::previous() }}">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('blog.partials._archive')
            </div>
        </div>
    </div>        
@endsection