@if(count($content))
    @foreach($content as $key => $item)
        <li @if($key % 2 != 0) class="timeline-inverted" @endif>
            <div class="timeline-badge success">{!! $item->present()->flagTipo !!}</div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title"><legend style="color:green;">{{ strtoupper($item->title) }}</legend></h4>
                    <p><small class="text-muted"><i class="fa fa-clock-o"></i> Publicado por {{ $item->present()->publicadoCompleto }}</small></p>
                </div>
                <div class="timeline-body">
                    <p>{!! $item->present()->getSubContent !!}</p>
                    <p class="text-right"><a class="btn btn-sm btn-success" href="{!! $item->present()->link !!}"> Abrir </a></p>
                </div>
            </div>
        </li>
    @endforeach
@endif