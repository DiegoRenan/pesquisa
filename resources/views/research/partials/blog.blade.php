<legend>Ultimas Publicações</legend>
@if(count($content))
    @foreach($content as $key => $item)
        <div>
            <div>
                <small>{!! $item->present()->flagTipo !!} {{ $item->title }}</small>
                <p><small class="text-muted"><i class="fa fa-clock-o"></i> Publicado por {{ $item->present()->publicadoCompleto }}</small></p>
            </div>
        </div>
        <hr/>
    @endforeach
@endif