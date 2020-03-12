@extends('templates/template-print')

@section('content')
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>Stream</th>
        <th>Pukul</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($absen as $da)
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
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection