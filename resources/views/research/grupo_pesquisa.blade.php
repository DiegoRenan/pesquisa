@extends('research.index')
@section('content')
    @include('admin.partials.remover')
    <div class="row">
        @include('research.partials.default_sidebar')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <div class="row">
                <div class="col-sm-11">
                    @include('errors.list')
                </div>
            </div>

            <div class="row">
                <div class="col-sm-11">
                    <legend><span class="glyphicon glyphicon-edit"></span> Grupos de Pesquisa</legend>
                </div>
            </div>

            @if(!isset($grupoUp))
                {!! Form::open(['method' => 'POST', 'route' => ['researcher.grupopesquisa.store']]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Novo Grupo de Pesquisa') !!}
                    <div class="row">
                        <div class="col-sm-11">
                            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <button class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Adicionar Grupo</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            @else
                {!! Form::model($grupoUp, ['method' => 'PUT', 'route' => ['researcher.grupopesquisa.update', $grupoUp->id]]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Editar Grupo de Pesquisa') !!}
                    <div class="row">
                        <div class="col-sm-11">
                            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-9">
                            <button class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Salvar Grupo</button>
                        </div>
                        <div class="col-sm-2 text-right">
                            <a href="{{ route('researcher.grupopesquisa.index') }}" class="btn btn-default"><strong>Cancelar</strong></a>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            @endif

            @if(!isset($grupoUp))
                <div class="row">
                    <div class="col-sm-11">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <span class="glyphicon glyphicon-list"></span> Meus Grupos de Pesquisa
                            </div>
                            <table class="table table-responsive">
                                <tbody>
                                @if(!is_null($grupos))
                                    @foreach($grupos as $grupo)
                                        <tr>
                                            <td width="75%">
                                                {{ $grupo->name }}
                                            </td>
                                            <td>
                                                <a class="btn btn-success" href="{{ route('researcher.grupopesquisa.edit', $grupo->id) }}" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
                                            </td>
                                            <td>
                                                {!! Form::open(['route' => ['researcher.grupopesquisa.destroy', $grupo->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#removerModal" data-title="Remover grupo de pesquisa: {{ $grupo->name }}" data-message="Você tem certeza que quer remover este grupo?" title="Remover Grupo de Pesquisa: {{ $grupo->name }}">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-11 text-right">
                        <a href="{{ route('researcher.index') }}" class="btn btn-default"><strong>Voltar</strong></a>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection