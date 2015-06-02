<div class="row">
    <div class="col-lg-2 col-md-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <span class="glyphicon glyphicon-bullhorn"></span>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div>Notícias</div>
                    </div>
                </div>
            </div>
            <a href="{{ url('admin/news/') }}">
                <div class="panel-footer">
                    Entrar
                    <span class="glyphicon glyphicon-circle-arrow-right"></span>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-2 col-md-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <span class="glyphicon glyphicon-file"></span>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div>Documentos</div>
                    </div>
                </div>
            </div>
            <a href="{{ url('admin/document/') }}">
                <div class="panel-footer">
                    Entrar
                    <span class="glyphicon glyphicon-circle-arrow-right"></span>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-2 col-md-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <span class="glyphicon glyphicon-file"></span>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div>Edital</div>
                    </div>
                </div>
            </div>
            <a href="{{ url('admin/edital/') }}">
                <div class="panel-footer">
                    Entrar
                    <span class="glyphicon glyphicon-circle-arrow-right"></span>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-2 col-md-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div>Agenda</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('event.index') }}">
                <div class="panel-footer">
                    Entrar
                    <span class="glyphicon glyphicon-circle-arrow-right"></span>
                </div>
            </a>
        </div>
    </div>
</div>