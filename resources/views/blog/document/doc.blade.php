@extends('app')
@section('content')
    <div class="publicacao">
        <div class="row">
            <div class="col-sm-9">
                <div class="row"><div class="col-sm-12"><h3>{{ $doc->title }}</h3></div></div>
                <div class="publicacao-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <small>
                                    <i class="glyphicon glyphicon-info-sign"></i> Publicado por {{ $doc->present()->publicadoCompleto }}
                                    <i class="glyphicon glyphicon-link"></i> Fonte: <a href="{{ $doc->url}}">{{ $doc->source }}</a>
                                </small>
                            </p>
                        </div>
                    </div>
                    <div class="row"><div class="col-sm-12"><p>{!! $doc->content !!}</p></div></div>
                    <div class="row">
                        <div class="col-sm-10">
                            <p class="blog-post-meta"><a href="{{ route('document.download', $doc->id) }}"><span class="glyphicon glyphicon-download-alt"></span> Baixar Arquivo</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1">
                            <a class="btn btn-default btn-xs" href="{{ URL::previous() }}">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                @include('blog.partials._archive')
            </div>
        </div>
    </div>        
@endsection