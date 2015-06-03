@extends('app')
@section('content')
    <h2>Eventos</h2>
    <hr/>
    @if(count($events))
        <div class="row">
            <div class="col-lg-9">
                @foreach($events as $event)
                    <!-- Blog Post Content Column -->
                    <div class="row">
                        <!-- Title -->
                        <h1>{{ $event->title }}</h1>

                        <hr>
                        <p><span class="glyphicon glyphicon-time"></span> De {{ $event->start->format('d M Y') }} a {{ $event->end->format('d M Y') }}.</p>
                        <!-- Post Content -->
                        {!! $event->text !!}
                        <hr/>
                    </div>
                @endforeach
            </div>

            <div class="col-md-3">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! $events->render() !!}
            </div>
        </div>
    @else
        <div class="alert alert-info">Não há eventos programados!</div>
    @endif
@endsection
@stop