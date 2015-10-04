@if(count($content))
	<div class="blogbar">
		<legend style="color: #428bca;">Ultimas Publicações</legend>
		@foreach($content as $key => $item)
			<div>
				<a href="{{ $item->present()->link }}">
					<small>{!! $item->present()->flagTipo !!} {{ strtoupper($item->title) }}</small>
				</a>
				<p>
					<small class="text-muted"><i class="fa fa-clock-o"></i> Publicado por {{ $item->present()->publicadoCompleto }}</small>
				</p>
			</div>
			<hr/>
		@endforeach
	</div>
@endif