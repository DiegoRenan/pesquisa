@extends('research.index')
@section('content')
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
                    <legend><i class="glyphicon glyphicon-edit"></i> Criar Projeto de Pesquisa</legend>
                    @yield('form')
                </div>
            </div>

        </div>
    </div>
@endsection