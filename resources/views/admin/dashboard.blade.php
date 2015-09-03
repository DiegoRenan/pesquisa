@extends('app')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-dashboard"></span> Painel de Controle</h3>
                </div>
            </div>
        </div>
        <div class="panel-body">
            @is('admin')
                @include('admin.partials.editor')
            @endis

            @is('admin')
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