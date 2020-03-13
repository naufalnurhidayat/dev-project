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
    <h1>Surat Pengajuan Peminjaman Barang </h1>
    @foreach ($pinjam as $item)
        
    <P>Dengan ini saya meminjam barang dengan perihal berikut.</P>
    <br>
    <p>Yang bertanda tangan dibawah ini :</p>
    <p>Nama        :  {{auth()->user()->nama}}</p>
    <p>Nama Barang :  {{$item->Barang['nama_barang']}}</p>
    <p>Status      :  {{$item->status}}</p>
    <p>Alamat      :  {{auth()->user()->alamat}}</p>
    <br>

    <p>Dengan ini mengajukan permohonan untuk pinjam dan pakai memanfaatkan barang tersebut untuk kelancarang tugas yang berkaitan
      dengan kepentingan perusahaan.
    </p>
    <p>Demikian pengajuan ini saya sampaikan, atas perhatiannya terima kasih. </p>
    
    @endforeach
    {{-- <table border="1" cellpadding="3" cellspasing="0">
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
      </table> --}}
  </body>
</html>