@if(count($content))
	<div class="blogbar">
		<legend style="color: #428bca;">Ultimas Publicações</legend>
		@foreach($content as $key => $item)
			<div>
				<p>
					<a href="{{ $item->present()->link }}"><small><i class="{{ $item->present()->flagTipo }}"></i> {{ strtoupper($item->title) }}</small></a>
					<small class="text-muted"><i class="fa fa-clock-o"></i> Publicado por {{ $item->present()->publicadoCompleto }}</small>
				</p>
			</div>
			<hr/>
		@endforeach
	</div>
@endif