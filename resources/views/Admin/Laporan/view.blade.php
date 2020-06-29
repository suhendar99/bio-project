<table style="border:1px solid black;   ">
    <thead>
    <tr>
        <td>No</td>
        <td>Tanggal Monitoring</td>
        <td>Waktu Monitoring</td>
        <td>Suhu</td>
        <td>Kelembapan</td>
        <td>Tekanan</td>
        <td>Alarm Status</td>
        <td>id ruangan</td>
    </tr>
    </thead>
    <tbody>
        @php $no = 1 @endphp
        @foreach($monitor as $a)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $a->date }}</td>
                <td>{{ $a->time }}</td>
                <td>{{ $a->suhu }}</td>
                <td>{{ $a->kelembapan }}</td>
                <td>{{ $a->tekanan }}</td>
                @if($a->alarm > 0)
                    <td>ON</td>
                @else
                    <td>OFF</td>
                @endif
                <td>{{ $a->ruangan->nama }}</td>
            </tr>
        @endforeach
    </tbody>
</table>