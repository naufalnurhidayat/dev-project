@extends('templates/template-home')

@section('title', 'Edit Profile')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4"><i class="fas fa-edit"></i>Edit Data Karyawan</h1>
                </div>
                <form method="POST" action="{{ url('/profile/edit/' . auth()->user()->id) }}" class="user">
                  @method('patch')
                  @csrf
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user @error('nip') is-invalid @enderror" value="{{ auth()->user()->nip }}" id="nip" placeholder="NIP" name="nip">
                      @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="nama" value="{{ auth()->user()->nama }}">
                      @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user @error('tmp_lahir') is-invalid @enderror" id="tmp_lahir" placeholder="Tempat Lahir" name="tmp_lahir" value="{{ auth()->user()->tmp_lahir }}">
                      @error('tmp_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-sm-6">
                      <input type="date" class="form-control form-control-user @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" placeholder="Tanggal Lahir" name="tgl_lahir" value="{{ auth()->user()->tgl_lahir }}">
                      @error('tgl_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ auth()->user()->email }}">
                      @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-sm-6">
                      @if (auth()->user()->jenkel == 'Laki-laki')
                        <input type="radio" class="form-check-input ml-2 @error('jenkel') is-invalid @enderror" id="Laki-laki" name="jenkel" value="Laki-laki" checked>
                        <label for="Laki-laki" class="ml-4">Laki-laki</label>
                        @error('jenkel') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <input type="radio" class="form-check-input ml-2 @error('jenkel') is-invalid @enderror" id="perempuan" name="jenkel" value="Perempuan">
                        <label for="perempuan" class="ml-4">Perempuan</label>
                        @error('jenkel') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      @else
                        <input type="radio" class="form-check-input ml-2 @error('jenkel') is-invalid @enderror" id="Laki-laki" name="jenkel" value="Laki-laki">
                        <label for="Laki-laki" class="ml-4">Laki-laki</label>
                        @error('jenkel') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <input type="radio" class="form-check-input ml-2 @error('jenkel') is-invalid @enderror" id="perempuan" name="jenkel" value="Perempuan" checked>
                        <label for="perempuan" class="ml-4">Perempuan</label>
                        @error('jenkel') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <select id="id_role" name="id_role" class="form-control @error('id_role') is-invalid @enderror">
                        <option value="">--Pilih Role--</option>
                        @foreach ($role as $r)
                            @if ($r->id === auth()->user()->id_role)
                                <option value="{{ $r->id }}" selected>{{ $r->role }}</option>
                            @else
                                <option value="{{ $r->id }}">{{ $r->role }}</option>    
                            @endif
                        @endforeach
                      </select>
                      @error('id_role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-sm-6">
                      <select id="id_pendidikan" name="id_pendidikan" class="form-control @error('id_pendidikan') is-invalid @enderror">
                        <option value="">--Pilih Pendidikan--</option>
                        @foreach ($pendidikan as $p)
                            @if ($p->id === auth()->user()->id_pendidikan)
                            <option selected value="{{ $p->id }}">{{ $p->pendidikan }}</option>
                            @else
                            <option value="{{ $p->id }}">{{ $p->pendidikan }}</option>
                            @endif 
                        @endforeach
                      </select>
                      @error('id_pendidikan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user @error('thn_join') is-invalid @enderror" id="thn_join" placeholder="Tahun Join" name="thn_join" value="{{ auth()->user()->thn_join }}">
                      @error('thn_join') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-user @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Nomor Telpon" name="no_telp" value="{{ auth()->user()->no_telp }}">
                      @error('no_telp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <select id="agama" name="agama" class="form-control @error('agama') is-invalid @enderror">
                        <option value="">--Pilih Agama--</option>
                        @foreach ($agama as $a)
                            @if ($a === auth()->user()->agama)
                                <option value="{{ $a }}" selected>{{ $a }}</option>
                            @else
                                <option value="{{ $a }}">{{ $a }}</option>    
                            @endif
                        @endforeach
                      </select>
                      @error('agama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-sm-6">
                      <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ auth()->user()->alamat }}</textarea>
                      @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                  </div>
                  <button type="submit" name="ubah" class="btn btn-primary btn-user btn-block">Edit Data</button>
                  <a href="{{ url('/profile/' . auth()->user()->nama) }}" class="btn btn-success btn-user btn-block">Kembali</a>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection