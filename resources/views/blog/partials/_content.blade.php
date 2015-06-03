<div class="col-sm-9">
    <div class="row">
        <h3>Notícias</h3>
        <div class="panel panel-success">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-bullhorn"></span>
            </div>
            @if(count($newses))
                <ul class="list-group">
                    @foreach($newses as $news)
                        <li class="list-group-item">
                            <a href="{{ route('blog.news', $news->id) }}">{{ $news->publicated_at->format('d/m/Y') }} - {{ $news->title }}</a>
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

    <div class="row">
        <h3>Editais</h3>
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-file"></span>
            </div>
            @if(count($editals))
                <ul class="list-group">
                    @foreach($editals as $edital)
                        <li class="list-group-item">
                            <a href="{{ route('blog.edital', $edital->id) }}">{{ $edital->started_at->format('d/m/Y') }} - {{ $edital->title }}</a>
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

    <div class="row">
        <h3>Documentos</h3>
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-file"></span>
            </div>
            @if(count($docs))
                <ul class="list-group">
                    @foreach($docs as $doc)
                        <li class="list-group-item">
                            <a href="{{ route('blog.document', $doc->id) }}">{{ $doc->created_at->format('d/m/Y') }} - {{ $doc->title }}</a>
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