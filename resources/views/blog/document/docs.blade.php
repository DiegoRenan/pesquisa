@extends('app')
@section('content')
    @if(count($documents))
        <div class="publicacao">
            <div class="row">
                <div class="col-sm-9">
                    @foreach($documents as $doc)
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{ $doc->present()->link }}"><h3>{{ strtoupper($doc->title) }}</h3></a>
                                <div class="publicacao-content">
                                    <p>
                                        <small>
                                            <span class="glyphicon glyphicon-info-sign"></span> Publicado por: {{ $doc->present()->publicadoCompleto }}.
                                            <span class="glyphicon glyphicon-link"></span> Fonte: <a href="{{ $doc->url }}">{{ $doc->source }}</a>
                                        </small>
                                    </p>
                                    <p>{!! $doc->content !!}</p>
                                    <p><span class="glyphicon glyphicon-link"></span> <a href="{{ route('document.download', $doc->id) }}">Download <span class="glyphicon glyphicon-file"></span></a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-sm-3">
                    @include('blog.partials._archive')
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {!! $documents->render() !!}
                </div>
            </div>
        </div>
    @endif
@endsection
@stop