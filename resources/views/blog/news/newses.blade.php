@extends('app')
@section('content')
    @if(count($newses))
        <div class="publicacao">
            <div class="row">
                <div class="col-sm-9">
                    @foreach($newses as $news)
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{ $news->present()->link }}"><h3>{{ strtoupper($news->present()->getTitle) }}</h3></a>
                                <div class="publicacao-content">
                                    <p>
                                        <small>
                                            <i class="glyphicon glyphicon-info-sign"></i> Publicado por {{ $news->present()->publicadoCompleto }}
                                            <i class="glyphicon glyphicon-link"></i> Fonte: {!! $news->present()->linkSource !!}
                                        </small>
                                    </p>
                                    <p>{!! $news->present()->getSubContent !!}</p>
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
                <div class="col-sm-12 text-center">
                    {!! $newses->render() !!}
                </div>
            </div>
        </div>
    @endif 
@endsection
@stop