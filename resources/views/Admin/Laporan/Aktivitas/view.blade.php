<table border="1">
    <thead>
    <tr>
        <td>No</td>
        <td>Nama Pengguna</td>
        <td>Level</td>
        <td>Aktivitas</td>
        <td>Waktu Aktivitas</td>
    </tr>
    </thead>
    <tbody>
        @php $no = 1 @endphp
        @foreach($Aktivasi as $a)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $a->operator->name }}</td>
                <td>{{ $a->operator->level }}</td>
                <td>{{ $a->description }}</td>
                <td>{{ $a->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>