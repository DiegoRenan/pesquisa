@extends('app')
@section('content')
    <div class="publicacao">
        <div class="row">
            <div class="col-sm-9">
                <div class="row"><div class="col-sm-12"><h3>{{ strtoupper($news->title) }}</h3></div></div>
                <div class="publicacao-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <small>
                                    <i class="glyphicon glyphicon-info-sign"></i> Publicado por {{ $news->present()->publicadoCompleto }}
                                    <i class="glyphicon glyphicon-link"></i> Fonte: <a href="{{ $news->url}}">{{ $news->source }}</a>
                                </small>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p>{!! $news->content !!}</p>
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