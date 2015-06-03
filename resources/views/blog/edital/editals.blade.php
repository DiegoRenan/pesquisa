@extends('app')
@section('content')
    @if(count($editals))
        <div class="row">
            <div class="col-lg-9">
                @foreach($editals as $edital)
                    <!-- Blog Post Content Column -->
                    <div class="row">
                        <!-- Title -->
                        <h1>{{ $edital->title }}</h1>

                        <hr>

                        <p><span class="glyphicon glyphicon-link"></span> Fonte: <a href="{{ $edital->url }}">{{ $edital->source }}</a></p>
                        <p><span class="glyphicon glyphicon-time"></span> Publicado em {{ $edital->started_at->format('d M, Y') }}.</p>
                        <p><span class="glyphicon glyphicon-link"></span> <a href="{{ url('edital.download', $edital->id) }}">Download <span class="glyphicon glyphicon-file"></span></a></p>

                        <!-- Post Content -->
                        {!! $edital->text !!}
                        <hr/>
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
                {!! $editals->render() !!}
            </div>
        </div>
    @endif
@endsection
@stop