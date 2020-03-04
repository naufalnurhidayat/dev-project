@extends('templates/template-admin')

@section('title', 'Edit Profile')

@section('content')

  <div class="container">
    <div class="row mb-5">
      <div class="col">
        <h3><i class="fas fa-edit"></i> Edit Profile</h3>
      </div>
    </div>
    <form action="{{ url('/admin/profile/edit/'.auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
      @method('patch')
      @csrf
      <div class="form-group row">
        <label for="nip" class="col-sm-3 col-form-label"><strong>NIP</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ auth()->user()->nip }}">
          @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-3 col-form-label"><strong>Nama</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ auth()->user()->nama }}">
          @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="tgl_lahir" class="col-sm-3 col-form-label"><strong>Tempat & Tanggal Lahir</strong></label>
        <div class="col-sm-2">
          <input type="text" class="form-control @error('tmp_lahir') is-invalid @enderror" id="tmp_lahir" name="tmp_lahir" value="{{ auth()->user()->tmp_lahir }}">
          @error('tmp_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-sm-3">
          <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ auth()->user()->tgl_lahir }}">
          @error('tgl_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label"><strong>Email</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ auth()->user()->email }}">
          @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="jenkel" class="col-sm-3 col-form-label"><strong>Jenis Kelamin</strong></label>
        <div class="col-sm-5 mt-2">
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
        <label for="id_stream" class="col-sm-3 col-form-label"><strong>Stream</strong></label>
        <div class="col-sm-5">
          <select id="id_stream" name="id_stream" class="form-control @error('id_stream') is-invalid @enderror">
            <option value="">--Pilih Role--</option>
            @foreach ($stream as $s)
                @if ($s->id === auth()->user()->id_stream)
                    <option value="{{ $s->id }}" selected>{{ $s->stream }}</option>
                @else
                    <option value="{{ $s->id }}">{{ $s->stream }}</option>    
                @endif
            @endforeach
          </select>
          @error('id_stream') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="id_pendidikan" class="col-sm-3 col-form-label"><strong>Pendidikan</strong></label>
        <div class="col-sm-5">
          <select id="id_pendidikan" name="id_pendidikan" class="form-control @error('id_pendidikan') is-invalid @enderror">
            <option value="">--Pilih Role--</option>
            @foreach ($pendidikan as $p)
                @if ($p->id === auth()->user()->id_pendidikan)
                    <option value="{{ $p->id }}" selected>{{ $p->pendidikan }}</option>
                @else
                    <option value="{{ $p->id }}">{{ $p->pendidikan }}</option>    
                @endif
            @endforeach
          </select>
          @error('id_pendidikan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="thn_join" class="col-sm-3 col-form-label"><strong>Tahun Join</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="thn_join" name="thn_join" value="{{ auth()->user()->thn_join }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="no_telp" class="col-sm-3 col-form-label"><strong>No. Telpon</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ auth()->user()->no_telp }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="agama" class="col-sm-3 col-form-label"><strong>Agama</strong></label>
        <div class="col-sm-5">
          <select id="agama" name="agama" class="form-control @error('agama') is-invalid @enderror">
              <option value="">--Pilih Agama--</option>
          @foreach ($agama as $a)                              
            @if ($a === auth()->user()->agama)
              <option n value="{{ $a }}" selected>{{ $a }}</option>
            @else
              <option value="{{ $a }}">{{ $a }}</option>
            @endif
          @endforeach 
          </select>
          @error('agama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="alamat" class="col-sm-3 col-form-label"><strong>Alamat</strong></label>
        <div class="col-sm-5">
          <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ auth()->user()->alamat }}</textarea>
          @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-3"><strong>Picture</strong></div>
        <div class="col-sm-5">
          <div class="row">
            <div class="col-sm-3">
              <img src="{{ asset('img/profile/' . auth()->user()->foto) }}" class="img-thumbnail" width="100">
            </div>
            <div class="col-sm-9">
              <div class="custom-file">
              <input type="file" class="custom-file-input" id="picture" name="picture">
              <label class="custom-file-label" for="picture">Pilih Gambar</label>
            </div>
            </div>
          </div>
        </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-2"></div>
      <div class="col-sm-5">
        <button type="submit" name="ubah" class="btn btn-primary btn-user">Edit Data</button>
        <a href="{{ url('/admin/profile/' . auth()->user()->nama) }}" class="btn btn-success btn-user">Kembali</a>
      </div>
    </div>
  </form>
  </div>

@endsection