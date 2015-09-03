@extends('app')
@section('content')
    @if(count($newses))
        <div class="row">
            <div class="col-lg-9">
                @foreach($newses as $news)
                    <!-- Blog Post Content Column -->
                    <div class="row">
                        <!-- Title -->
                        <h1>{{ $news->publicacao->title }}</h1>

                        <hr>

                        <p><span class="glyphicon glyphicon-link"></span> Fonte: <a href="{{ $news->publicacao->url }}">{{ $news->publicacao->source }}</a></p>
                        <p><span class="glyphicon glyphicon-time"></span> Publicado em {{ $news->publicated_at->format('d M, Y') }}. Por {{ $news->publicacao->user->name }}</p>

                        <p>{!! $news->publicacao->content !!}</p>
                        <hr>

                        <!-- Post Content -->
                        {!! $news->content !!}
                    </div>
                @endforeach
            </div>

            <div class="col-md-3">
                {{--<div class="well">
                    <h4>Arquivo</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Janeiro</a></li>
                                <li><a href="#">Feveiro</a></li>
                                <li><a href="#">Março</a></li>
                                <li><a href="#">Abril</a></li>
                                <li><a href="#">Maio</a></li>
                                <li><a href="#">Junho</a></li>
                                <li><a href="#">Julho</a></li>
                                <li><a href="#">Agosto</a></li>
                                <li><a href="#">Setembro</a></li>
                                <li><a href="#">Outubro</a></li>
                                <li><a href="#">Novembre</a></li>
                                <li><a href="#">Dezembro</a></li>
                            </ul>
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! $newses->render() !!}
            </div>
        </div>
    @endif
@endsection
@stop