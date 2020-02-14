@extends('templates/template-cuti')

@section('title', 'Form Pengajuan Cuti')

@section('content')
    <div class="container">
      <div class="row mx-auto">
        <div class="col-6">
          <h3 class="mb-4"><i class="fas fa-calendar-week"></i> Form Pengajuan Cuti</h3>
          <form action="{{ url('/cuti') }}" method="post">
            @csrf
            <input type="hidden" value="1" name="id_karyawan">
            <div class="form-group">
              <label for="karyawan">Karyawan</label>
              <input type="text" class="form-control @error('karyawan') is-invalid @enderror" name="karyawan" id="karyawan" value="iqbal" readonly>
              @error('karyawan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
              <label for="jencut">Jenis Cuti</label>
              <select  class="form-control @error('jencut') is-invalid @enderror" name="jencut" id="jencut">
                  <option selected value="">-- Pilih Jenis Cuti --</option>
                @foreach ($jencut as $j)
                  <option value="{{$j->id}}">{{$j->jenis_cuti}}</option>  
                @endforeach
              </select>
              @error('jencut')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group row">
              <div class="col-5">
                <label for="awal">Awal Cuti</label>
                <input type="date" class="form-control @error('awal') is-invalid @enderror" name="awal" id="awal" value="{{ old('awal') }}">
                @error('awal')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-5">
                <label for="akhir">akhir Cuti</label>
                <input type="date" class="form-control @error('akhir') is-invalid @enderror" name="akhir" id="akhir" value="{{ old('akhir') }}">
                @error('akhir')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-group">
              <label for="alasan">Alasan Cuti</label>
              <textarea class="form-control @error('alasan') is-invalid @enderror" name="alasan" id="alasan" rows="3">{{ old('alasan') }}</textarea>
                @error('alasan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-success float-right">Submit</button>
          </form>
        </div>
      </div>
    </div>
@endsection