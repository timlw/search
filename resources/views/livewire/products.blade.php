<div>

	<div style="max-width:850px; margin:20px auto 40px" class="text-muted">
	
		<p><b>Notes:</b> This search performs an 'or' on every term, so it is more greedy and will include more results. Given a bit more time, I would convert this into a "full text" search with boolean options and weighted terms, so that when you are searching for 'organic t-shirt' it will show results that match BOTH (organic AND t-shirt) rather than (organic OR t-shirt).<p>
		
		<p>I could also use a subquery and concatentate the tags found into a new field on the main query, and use that as part of my search filter.</p>
		<p>This form uses a library called 'livewire' which is an ajax-based MVVM approach. The search will update on keypress.</p>
	
	</div>
	
	<h4>Product Search</h4>
	
	<div class="input-group rounded" style="max-width:300px; margin:20px auto">
	  <input type="search" class="form-control rounded" placeholder="e.g. T-shirt" aria-label="Search" aria-describedby="search-addon" wire:model="searchTerm"/>
	</div>
	
	<br/>
	
	@if($products)

		<ul style="width:640px; margin:0 auto; text-align:left" class="mt-3">
			@foreach($products as $product)
				<li class="row m-2">
					<span class="col-md-4">{{ $product->name }} </span>
					<span class="col-md-4"> {{ $product->type }} </span>
					<span class="col-md-4 text-muted"> @foreach($product->tags as $tag) {{ $tag->name }} <br> @endforeach </span>
				</li>
			
			@endforeach
		</ul>

	@endif
	
</div>