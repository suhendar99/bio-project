<style>
    .border{

    }
</style>
<table>
    <thead>
    <tr>
        <td>No</td>
        <td>Tanggal Monitoring</td>
        <td>Waktu Monitoring</td>
        @if ($satuan == 'suhu' || $satuan == 'allper')
        <td>Suhu</td>
        @endif
        @if ($satuan == 'kelembapan' || $satuan == 'allper')
        <td>Kelembapan</td>
        @endif
        @if ($satuan == 'tekanan' || $satuan == 'allper')
        <td>Tekanan</td>
        @endif
        {{-- <td>Alarm Status</td> --}}
        <td>Nama Ruangan</td>
    </tr>
    </thead>
    <tbody>
        @php $no = 1 @endphp
        @foreach($monitor as $a)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $a->date }}</td>
                <td>{{ $a->time }}</td>
                @if ($satuan == 'suhu' || $satuan == 'allper')
                <td>{{ $a->suhu }}</td>
                @endif
                @if ($satuan == 'kelembapan' || $satuan == 'allper')
                <td>{{ $a->kelembapan }}</td>
                @endif
                @if ($satuan == 'tekanan' || $satuan == 'allper')
                <td>{{ $a->tekanan }}</td>
                @endif
                {{-- @if($a->alarm > 0)
                    <td>ON</td>
                @else
                    <td>OFF</td>
                @endif --}}
                <td>{{ $a->ruangan->nama }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
