<div class="col-sm-9">
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading"><h3>Notícias</h3></div>

            @if(count($newses))
                <div class="list-group">
                    @foreach($newses as $news)
                            <a class="list-group-item" href="{{ route('blog.news', $news->id) }}">
                                <h4 class="list-group-item-heading">{{ $news->title }}</h4>
                                <p class="list-group-item-text">Publicado em {{ $news->publicated_at->format('d/m/Y') }}</p>
                            </a>
                    @endforeach
                    <li class="list-group-item"><a href="{{ route('blog.newses') }}">Ver mais <span class="glyphicon">&rarr;</span></a></li>
                </div>
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
        <div class="panel panel-info">
            <div class="panel-heading"><h3>Editais</h3></div>
            @if(count($editals))
                <div class="list-group">
                    @foreach($editals as $edital)
                        <a class="list-group-item" href="{{ route('blog.edital', $edital->id) }}">
                            <h4 class="list-group-item-heading">{{ $edital->title }}</h4>
                            <p class="list-group-item-text">{{ $edital->started_at->format('d/m/Y') }} - {{ $edital->finished_at->format('d/m/Y') }}</p>
                        </a>
                    @endforeach
                    <li class="list-group-item"><a href="{{ route('blog.editals') }}">Ver mais <span class="glyphicon">&rarr;</span></a></li>
                </div>
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
        <div class="panel panel-info">
            <div class="panel-heading"><h3>Documentos</h3></div>
            @if(count($docs))
                <div class="list-group">
                    @foreach($docs as $doc)
                        <a class="list-group-item" href="{{ route('blog.document', $doc->id) }}">
                            <h4 class="list-group-item-heading">{{ $doc->title }}</h4>
                            <p class="list-group-item-text">Publicado em {{ $doc->created_at->format('d/m/Y') }} </p>
                        </a>
                    @endforeach
                    <li class="list-group-item"><a href="{{ route('blog.documents') }}">Ver mais <span class="glyphicon">&rarr;</span></a></li>
                </div>
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