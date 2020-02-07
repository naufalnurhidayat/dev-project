@extends('templates.template-dasar')

@section('title', 'Registrasi Karyawan')

@section('content')

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Registrasi Karyawan</h1>
          </div>
          <form class="user">
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="nip" placeholder="NIP" name="nip">
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama" name="nama">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                  <div class="row">
                      <div class="col">
                          <input type="radio" name="jenis_kelamin" class="form-check-input ml-3" id="laki-laki" value="Laki-laki">
                          <label for="laki-laki" class="form-check-label ml-5">Laki-laki</label>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col">
                          <input type="radio" name="jenis_kelamin" class="form-check-input ml-3" id="perempuan" value="Perempuan">
                          <label for="perempuan" class="form-check-label ml-5">Perempuan</label>
                      </div>
                  </div>
              </div>
              <div class="col-sm-6">
                <select id="inputState" class="form-control" name="id_role">
                    <option value="">--Pilih Role--</option>
                    <option value="">...</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <select id="inputState" class="form-control" name="id_pendidikan">
                    <option value="">--Pilih Pendidikan--</option>
                    <option value="">...</option>
                </select>
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" id="tahun_masuk" placeholder="Tahun Masuk" name="tahun_masuk">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="nomor_telpon" placeholder="Nomor Telpon" name="nomor_telpon">
              </div>
              <div class="col-sm-6">
                <textarea class="form-control" id="alamat" name="alamat">Alamat...</textarea>
              </div>
            </div>
            
            <hr>

            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
            </div>
            <div class="form-group">
              <input type="email" class="form-control form-control-user" id="email" placeholder="Email" name="email">
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
              </div>
              <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
              </div>
            </div>
            <a href="" class="btn btn-primary btn-user btn-block">
              Registrasi
            </a>
          </form>
          <hr>
          <div class="text-center">
            <a class="small" href="{{url('/login')}}">Login</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

@endsection