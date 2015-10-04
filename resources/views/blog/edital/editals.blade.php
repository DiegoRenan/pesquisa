@extends('app')
@section('content')
    @if(count($editals))
        <div class="publicacao">
            <div class="row">
                <div class="col-lg-9">
                    @foreach($editals as $edital)
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{ $edital->present()->link }}"><h3>{{ strtoupper($edital->title) }}</h3></a>
                                <div class="publicacao-content">
                                    <p>
                                        <small>
                                            <span class="glyphicon glyphicon-info-sign"></span> Publicado por: {{ $edital->present()->publicadoCompleto }}.
                                            <span class="glyphicon glyphicon-link"></span> Fonte: <a href="{{ $edital->url }}">{{ $edital->source }}</a>
                                        </small>
                                    </p>
                                    <p>{!! $edital->content !!}</p>
                                    <p><span class="glyphicon glyphicon-time"></span> Data inicial: {{ $edital->edital->present()->startedAt }}.</p>
                                    <p><span class="glyphicon glyphicon-time"></span> Data final: {{ $edital->edital->present()->finishedAt }}.</p>
                                    <p><span class="glyphicon glyphicon-link"></span> <a href="{{ route('edital.download', $edital->id) }}">Download <span class="glyphicon glyphicon-file"></span></a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-3">
                    @include('blog.partials._archive')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    {!! $editals->render() !!}
                </div>
            </div>
        </div>
    @endif
@endsection
@stop