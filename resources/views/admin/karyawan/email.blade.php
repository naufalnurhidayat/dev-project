<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .aktivasi:hover {
            cursor: 'pointer';
        }
    </style>
    <title>Kirim Email</title>
</head>
<body>
    <h1>Data Karyawan Baru</h1>
    <ul>
        <li>NIP: {{$nip}}</li>
        <li>Nama: {{$nama}}</li>
        <li>Email: {{$email}}</li>
        <li>Jenis Kelamin: {{$jenkel}}</li>
        <li>Role: {{$role}}</li>
        <li>Stream: {{$stream}}</li>
        <li>Nomor Telpon: {{$no_telp}}</li>
    </ul>
</body>
</html>