@extends('app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-dashboard"></span> Painel de Controle</h3>
        </div>
        <div class="panel-body">
            @is(['editor', 'admin'])
                @include('admin.partials.editor')
            @endis

            @is(['coordenador', 'admin'])
                @include('admin.partials.coordenador')
            @endis

            <div class="row">
                @is('admin')
                    @include('admin.partials.admin')
                @endis

                @include('admin.partials.logout')

            </div>
        </div>
    </div>
@endsection