<html>
  <head>
    <title>Daftar Peminjaman</title>
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
    <h1>Daftar Peminjam</h1>
      <table border="1" cellpadding="3" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Nama Barang</th>
            <th>Tanggal Pinjam</th>
          </tr>
        </thead>
        <tbody id="tampunganExport">
          @foreach ($pinjam as $da)
          <tr align="center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $da->User['nip'] }}</td>
            <td>{{ $da->User['nama'] }}</td>
            <td>{{ $da->Barang['nama_barang'] }}</td>
            <td>{{ $da->tgl_pinjam }}</td>
        @endforeach
        </tbody>
      </table>
  </body>
</html>