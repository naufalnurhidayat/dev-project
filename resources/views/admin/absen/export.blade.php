<html>
  <head>
    <title>Daftar Absensi</title>
    <style>
      h1 {
        text-align: center;
      }
      table {
        margin: auto;
      }
      .success {
        display: inline-block;
        background-color: lightgreen;
        border-radius: 5px;
        width: 80px;
      }
      .warning {
        display: inline-block;
        background-color: orange;
        border-radius: 5px;
        width: 80px;
      }
      .warning {
        display: inline-block;
        background-color: red;
        border-radius: 5px;
        width: 80px;
      }
    </style>
  </head>
  <body>
    <h1>Daftar Absensi</h1>
      <table border="1" cellpadding="3" cellspasing="0">
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
              <td><span class="success">{{ $da->status }}</span></td>
            @elseif($da->status == 'Rejecting')
              <td><span class="danger">{{ $da->status }}</span></td>
            @else
              <td><span class="warning">{{ $da->status }}</span></td>
            @endif
            </tr>
        @endforeach
        </tbody>
      </table>
  </body>
</html>