@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if(count($events))
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Eventos</h3>
                    </div>
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <td>
                                    <strong>Título</strong>
                                </td>
                                <td>
                                    <strong>Data de Início</strong>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>
                                        {{ $event->title }}
                                    </td>
                                    <td>
                                        {{ $event->evento->start->format("d/m/Y") }}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('event.show', $event->id) }}" title="Visualizar evento: {{ $event->title }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('event.edit', $event->id) }}" title="Editar evento: {{ $event->title }}"><span class="glyphicon glyphicon-edit"></span></a>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'delete', 'route' => ['event.delete', $event->id]]) !!}
                                        <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td colspan="5" style="text-align: center;">{!! $events->render() !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info"><strong>Ainda não há eventos cadastradas!</strong></div>
                @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <a class="btn btn-primary" href="{{ route('event.create') }}"><span class="glyphicon glyphicon-plus"></span> <strong>Novo Evento</strong></a>
        </div>
        <div class="col-sm-2 text-right">
            <a class="btn btn-default" href="{{ route('admin.index') }}"><strong>Voltar</strong></a>
        </div>
    </div>
@endsection