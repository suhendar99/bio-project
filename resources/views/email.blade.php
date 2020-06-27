
{{-- <h3>Halo, {{ $data }} !</h3> --}}
{{-- <p>{{ $website }}</p> --}}
 
<p>Alert</p>
<p>Cek monighfghfgfghfhgftoring sekarang juga!</p>
<p>{{ $data }}</p>
<a href="localhost:8000/cetak_laporan">Hey</a>


{{-- <form action="localhost:8000/downloadLaporan" method="POST">
    @csrf
    <input type="hidden" name="awal" id="awal" disabled>
    <input type="hidden" name="akhir" id="akhir" disabled>
    <input type="hidden" name="ruang" value="all" disabled>
    <input type="hidden" name="satuan" value="allper" disabled>
    <button type="submit">PDF</button>
</form> --}}

{{-- <script>
	const today = new Date();
    const date = today.getFullYear()+'-'+(today.getMonth())+'-'+today.getDate();

    const awal = document.querySelector("#awal");
    const akhir = document.querySelector("#akhir");

    awal.value = date;
    akhir.value = date;
</script> --}}