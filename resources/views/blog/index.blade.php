@extends('app')
@section('content')
    <div id="timeline">
        <div class="row">
            <div class="col-sm-12">
                <div class="timeline-select text-center">
                    <div class="btn-group btn-group-xs">
                        <button class="btn btn-success btn-xs" v-on="click:doFilter($event, '')">Todos</button>
                        <button class="btn btn-success btn-xs" v-on="click:doFilter($event, 'EV')">Agenda</button>
                        <button class="btn btn-success btn-xs" v-on="click:doFilter($event, 'NW')">Notícia</button>
                        <button class="btn btn-success btn-xs" v-on="click:doFilter($event, 'ED')">Edital</button>
                        <button class="btn btn-success btn-xs" v-on="click:doFilter($event, 'DC')">Documento</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-body">
                        <!-- <div class="well">
                            @{{ items | json }}
                        </div> -->
                        <ul id="items" class="timeline">
                            <li v-repeat="item:items | filterBy searchText in 'tipo'" v-class="timeline-inverted:($index % 2) != 0">
                                <div class="timeline-badge success"><i class="@{{ item.flagTipo }}"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h5 class="timeline-title">@{{ item.title | uppercase }}</h5>
                                        <p><small class="text-muted"><i class="fa fa-clock-o"></i> Publicado por @{{ item.info }}</small></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>@{{ item.content }}</p>
                                        <p class="text-right"><a class="btn btn-sm btn-success" href="@{{ item.link }}"> Abrir </a></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection