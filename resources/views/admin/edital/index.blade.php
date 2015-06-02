@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if(count($editals))
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Editais</h3>
                </div>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <td>
                                <strong>Título</strong>
                            </td>
                            <td>
                                <strong>Data de Publicação</strong>
                            </td>
                            <td colspan="6">
                                <strong>Autor</strong>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($editals as $edital)
                            <tr>
                                <td>
                                    {{ $edital->title }}
                                </td>
                                <td>
                                    {{ $edital->created_at->format('d/m/Y') }}
                                </td>
                                <td>
                                    {{ $edital->user->name }}
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('edital.show', $edital->id) }}" title="Visualizar edital: {{ $edital->title }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('edital.edit', $edital->id) }}" title="Editar edital: {{ $edital->title }}"><span class="glyphicon glyphicon-edit"></span></a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'delete', 'route' => ['edital.delete', $edital->id]]) !!}
                                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" style="text-align: center;">{!! $editals->render() !!}</td>
                        </tr>
                        </tbody>
                    </table>
            </div>
            @else
                <div class="alert alert-info"><strong>Ainda não há editais cadastradas!</strong></div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <a class="btn btn-primary" href="{{ route('edital.create') }}"><span class="glyphicon glyphicon-plus"></span> <strong>Novo Edital</strong></a>
        </div>
        <div class="col-sm-2 text-right">
            <a class="btn btn-default" href="{{ route('admin.index') }}"><strong>Voltar</strong></a>
        </div>
    </div>
@endsection