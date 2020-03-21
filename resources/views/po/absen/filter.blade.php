@foreach ($data_absen as $da)
    <tr align="center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $da->User['nip'] }}</td>
        <td>{{ $da->User['nama'] }}</td>
        <td>{{ $da->User->Stream['stream'] }}</td>
        <td>{{ $da->jam_masuk }}</td>
        <td>{{ $da->tanggal }}</td>
        <td>{{ $da->catatan }}</td>
        @if($da->status == 'Accepting')
        <td><span class="badge badge-success">{{ $da->status }}</span></td>
        @elseif($da->status == 'Rejecting')
        <td><span class="badge badge-danger">{{ $da->status }}</span></td>
        @else
        <td><span class="badge badge-warning">{{ $da->status }}</span></td>
        @endif
        <td>
        <form action="{{ url('/po/absen/data-kehadiran/'. $da->id_absen) }}" method="POST">
            @method('patch')
            @csrf
            <a href="{{ url('/po/absen/data-kehadiran/' . $da->id_absen) }}" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></a>
            <button type="submit" class="btn btn-success btn-sm" name="prove" value="Accepting" onclick="return confirm('Accept?')"><i class="fas fa-check-circle"></i></button>
            <button type="submit" class="btn btn-danger btn-sm" name="prove" value="Rejecting" onclick="return confirm('Reject?')"><i class="fas fa-times-circle"></i></button>
        </form>
        </td>
    </tr>
@endforeach