@extends('app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><span class="glyphicon glyphicon-dashboard"></span> Administração - Dashboard</div>
            <div class="panel-body">

                <div class="col-lg-2 col-md-4">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    <span class="glyphicon glyphicon-user"></span>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div>Usuários</div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group">
                            <a href="{{ route('admin.stuff.users.index') }}" class="list-group-item">Usuários</a>
                            <a href="{{ route('admin.stuff.roles.index') }}"  class="list-group-item">Categoria dos Usuários</a>
                            <a class="list-group-item">Permissões</a>
                        </div>
                    </div>
                </div>
<!--------------------------------------------------------------------------------------------------------------------->
                <div class="col-lg-2 col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    <span class="glyphicon glyphicon-user"></span>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div>Pesquisadores</div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group">
                            <a href="{{ route('admin.stuff.titles.index') }}" class="list-group-item">Titulação</a>
                            <a href="{{ route('admin.stuff.categories.index') }}" class="list-group-item">Categoria de Pesquisadores</a>
                            <a href="{{ route('admin.stuff.works.index') }}" class="list-group-item">Regime de Trabalho</a>
                            <a href="{{ route('admin.stuff.campus.index') }}" class="list-group-item">Campus</a>
                            <a href="{{ route('admin.stuff.institutes.index') }}" class="list-group-item">Instituto</a>
                            <a href="{{ route('admin.stuff.departments.index') }}" class="list-group-item">Departamento</a>
                        </div>
                    </div>
                </div>
<!--------------------------------------------------------------------------------------------------------------------->
                <div class="col-lg-2 col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div>Projetos</div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group">
                            <a href="{{ route('admin.stuff.areacnpq.index') }}" class="list-group-item">Áreas do CNPQ</a>
                            <a href="{{ route('admin.stuff.subareacnpq.index') }}" class="list-group-item">Sub-Áreas do CNPQ</a>
                            <a class="list-group-item">Log dos Projetos</a>
                        </div>
                    </div>
                </div>
<!--------------------------------------------------------------------------------------------------------------------->
                <div class="col-lg-2 col-md-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    <span class="glyphicon glyphicon-cog"></span>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div>Stuff</div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group">
                            <a class="list-group-item">E-mail da Coordenação</a>
                            <a href="#" class="list-group-item">Log do Sistema</a>
                            <a class="list-group-item">Log do Script Lattes</a>
                        </div>
                    </div>
                </div>
<!--------------------------------------------------------------------------------------------------------------------->
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 text-right">
        <a class="btn btn-default" href="{{ route('admin.index') }}" title="Voltar">Voltar</a>
    </div>
</div>
@endsection