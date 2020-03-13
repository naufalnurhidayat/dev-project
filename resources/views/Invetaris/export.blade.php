<html>
  <head>
    <title>Surat Pminjaman</title>
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
            <th>Nama Barang</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pinjam as $da)
          <tr align="center">
            <td>{{$da->Barang['nama_barang']}}</td>
        @endforeach
        </tbody>
      </table>
  </body>
</html>