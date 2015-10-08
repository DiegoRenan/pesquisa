{{--<div id="archive" class="well archive">
    <!-- <div class="well">
        <pre>@{{ articles | json }}</pre>
    </div> -->
    <h4 style="color: green; text-decoration: underline; font-weight:bold;">ARQUIVO</h4>
    <div class="row">
        <div class="col-sm-12">
            <ul class="list-unstyled">
                @foreach($archives as $item)
                    <li>
                        <a href="#">{{ $item['month_name'] }} - {{ $item['year'] }} ({{ $item['post_count'] }})</a>
                        <ul class="">
                            @foreach($item['articles'] as $article)
                                <li>
                                    <a href="{{ route('blog.news', $article['id']) }}">{!! $article['title'] !!}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>                
                @endforeach
            </ul>
        </div>
    </div>
</div>--}}