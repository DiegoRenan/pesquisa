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

            <!-- Loading -->
            <div class="modal fade" id="loading">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Carregando...</h4>
                        </div>
                        <div class="modal-body text-center">
                            <i class="fa fa-refresh fa-spin fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-11">
                    <legend><i class="glyphicon glyphicon-edit"></i> Criar Projeto de Pesquisa</legend>
                    <div id="app">
                        <meta name="csrf-token" content="{{ csrf_token() }}" v-el="token" />
                        <!-- Loading -->
                        <div class="modal fade" id="loading">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Carregando...</h4>
                                    </div>
                                    <div class="modal-body text-center">
                                        <i class="fa fa-refresh fa-spin fa-3x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
>>>>>>> f65259f451c6eeb9e68971d99c336f48f399da48
                        <ol class="breadcrumb">
                            <li><a href="#div1" v-class="active:form == '#div1'" v-model="form" v-on="click:doNext($event, '#div1')"><small>Dados Pessoais</small></a></li>
                            <li><a href="#div2" v-class="active:form == '#div2'" v-model="form" v-on="click:doNext($event, '#div2')"><small>Enquadramento</small></a></li>
                            <li><a href="#div3" v-class="active:form == '#div3'" v-model="form" v-on="click:doNext($event, '#div3')"><small>Caracterização</small></a></li>
                            <li><a href="#div4" v-class="active:form == '#div4'" v-model="form" v-on="click:doNext($event, '#div4')"><small>Objetivos</small></a></li>
                            <li><a href="#div5" v-class="active:form == '#div5'" v-model="form" v-on="click:doNext($event, '#div5')"><small>Metodologia</small></a></li>
                            <li><a href="#div6" v-class="active:form == '#div6'" v-model="form" v-on="click:doNext($event, '#div6')"><small>Equipe</small></a></li>
                            <li><a href="#div7" v-class="active:form == '#div7'" v-model="form" v-on="click:doNext($event, '#div7')"><small>Orçamento</small></a></li>
                            <li><a href="#div8" v-class="active:form == '#div8'" v-model="form" v-on="click:doNext($event, '#div8')"><small>Cronograma</small></a></li>
                            <li><a href="#div9" v-class="active:form == '#div9'" v-model="form" v-on="click:doNext($event, '#div9')"><small>Referências</small></a></li>
                            <li><a href="#div10" v-class="active:form == '#div10'" v-model="form" v-on="click:doNext($event, '#div10')"><small>Anexos</small></a></li>
                            <li><a href="#div11" v-class="active:form == '#div11'" v-model="form" v-on="click:doNext($event, '#div11')"><small>Revisão</small></a></li>
                        </ol>

                        <div v-show="form == '#div1'">@include('research.project.partials.form_dados_pessoais')</div>
                        <div v-show="form == '#div2'">@include('research.project.partials.form_enquadramento')</div>
                        <div v-show="form == '#div3'">@include('research.project.partials.form_caracterizacao')</div>
                        <div v-show="form == '#div4'">@include('research.project.partials.form_objetivos')</div>
                        <div v-show="form == '#div5'">@include('research.project.partials.form_metodologia')</div>
                        <div v-show="form == '#div6'">@include('research.project.partials.form_equipe')</div>
                        <div v-show="form == '#div7'">@include('research.project.partials.form_orcamento')</div>
                        <div v-show="form == '#div8'">@include('research.project.partials.form_cronograma')</div>
                        <div v-show="form == '#div9'">@include('research.project.partials.form_referencias')</div>
                        <div v-show="form == '#div10'">@include('research.project.partials.form_anexos')</div>
                        <div v-show="form == '#div11'">@include('research.project.partials.form_revisao')</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection