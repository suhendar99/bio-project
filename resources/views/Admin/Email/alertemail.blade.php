<p>Alert!!!</p>
<p>Message:</p>
<p>{{ $user }}</p>

<ol>
	@foreach($alert as $message)
		<li>{{ $message }}</li>
	@endforeach
</ol>