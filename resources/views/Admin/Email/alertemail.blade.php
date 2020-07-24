<p>Alert!!!</p>
<p>{{ $user }}</p>

<ol>
	@foreach($alert as $message)
		<li>{{ $message }}</li>
	@endforeach
</ol>