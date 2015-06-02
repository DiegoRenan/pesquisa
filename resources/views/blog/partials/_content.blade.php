<div class="col-sm-9">
    <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-bullhorn"></span> <strong>Notícias</strong>
            </div>
            @if(count($newses))
                <ul class="list-group">
                    @foreach($newses as $news)
                        <li class="list-group-item">
                            <a href="{{ route('blog.news', $news->id) }}">{{ $news->title }}</a>
                        </li>
                    @endforeach
                    <li class="list-group-item"><a href="{{ route('blog.newses') }}">Ver mais <span class="glyphicon">&rarr;</span></a></li>
                </ul>
            @else
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        <strong>Não há notícias!</strong>
                    </li>
                </ul>
            @endif
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-file"></span> <strong>Editais</strong>
            </div>
            @if(count($editals))
                <ul class="list-group">
                    @foreach($editals as $edital)
                        <li class="list-group-item">
                            <a href="{{ route('blog.edital', $edital->id) }}">{{ $edital->title }}</a>
                        </li>
                    @endforeach
                    <li class="list-group-item"><a href="{{ route('blog.editals') }}">Ver mais <span class="glyphicon">&rarr;</span></a></li>
                </ul>
            @else
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        <strong>Não há editais!</strong>
                    </li>
                </ul>
            @endif
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-file"></span> <strong>Documentos</strong>
            </div>
            @if(count($docs))
                <ul class="list-group">
                    @foreach($docs as $doc)
                        <li class="list-group-item">
                            <a href="{{ route('blog.document', $doc->id) }}">{{ $doc->title }}</a>
                        </li>
                    @endforeach
                    <li class="list-group-item"><a href="{{ route('blog.documents') }}">Ver mais <span class="glyphicon">&rarr;</span></a></li>
                </ul>
            @else
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        <strong>Não há documentos!</strong>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>