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
    </style>
  </head>
  <body>
    <h1>Daftar Absensi</h1>
      <table border="1" cellpadding="3" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Stream</th>
            <th>Jam Datang</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
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
        @endforeach
        </tbody>
      </table>
  </body>
</html>