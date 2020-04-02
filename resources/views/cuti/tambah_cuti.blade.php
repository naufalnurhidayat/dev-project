@extends('templates/template-home')

@section('title', 'Form Perpanjang Cuti')

@section('content')
    <div class="container">
      @if (session('status'))
        <div class="alert alert-danger">
          {{ session('status') }}
        </div>
      @endif
      <div class="row mx-auto">
        <div class="col">
          <h3 class="mb-4"><i class="fas fa-calendar-alt"></i> Form Perpanjang Cuti</h3>
          <form action="{{ url('/cuti/'.$cuti->id) }}" method="post">
            @csrf
            <div class="form-group">
              <label for="karyawan">Karyawan</label>
              <input type="text" class="form-control @error('karyawan') is-invalid @enderror" name="karyawan" id="karyawan" value="{{auth()->user()->nama}}" readonly>
              @error('karyawan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
              <label for="jencut">Jenis Cuti</label>
              <input type="text" class="form-control @error('jencut') is-invalid @enderror" name="jencut" id="jencut" value="{{ $cuti->jenis_cuti['jenis_cuti'] }}" readonly>
              @error('jencut')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="awal">Awal Cuti</label>
                @php
                  $explodeAwal = explode('-', $cuti->awal_cuti);
                  $newAwal = [$explodeAwal[1], $explodeAwal[2], $explodeAwal[0]];
                  $awal = implode('/', $newAwal);
                @endphp
                <input type="text" class="form-control @error('awal') is-invalid @enderror" name="awal" id="datePickerAwalCuti" value="{{ $awal }}" readonly autocomplete="off">
                @error('awal')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-6">
                <label for="akhir">akhir Cuti</label>
                <input type="text" class="form-control @error('akhir') is-invalid @enderror" name="akhir" id="datePickerAkhirCuti" value="{{ $cuti->akhir_cuti }}" readonly autocomplete="off">
                @error('akhir')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-group">
              <label for="totalCuti">Total Cuti</label>
              <input type="number" min="1" class="form-control @error('totalCuti') is-invalid @enderror" name="totalCuti" id="totalCuti" value="{{ $cuti->total_cuti }}">
              @error('totalCuti')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
              <label for="alasan">Alasan Cuti</label>
              <textarea class="form-control @error('alasan') is-invalid @enderror" name="alasan" id="alasan" rows="3">{{ old('alasan') }}</textarea>
                @error('alasan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-success float-right">Submit</button>
            <a href="{{url('/cuti')}}" class="btn btn-danger float-right mr-2">Kembali</a>
          </form>
        </div>
      </div>
    </div>
@endsection

@section('footer')
<script>
  $(document).ready(function(){

    const pickerAwalCuti = datepicker('#datePickerAwalCuti', {
      formatter: (input, date, instance) => {
        input.value = date.toLocaleDateString()
      },
      minDate: new Date({{date('Y')}}, {{date('m')-1}}, {{date('d')}}),
      noWeekends: true
    });
    
    const pickerAkhirCuti = datepicker('#datePickerAkhirCuti', {
      formatter: (input, date, instance) => {
        input.value = date.toLocaleDateString()
      },
      minDate: new Date({{date('Y')}}, {{date('m')-1}}, {{date('d')}}),
      noWeekends: true
    });

    $("#totalCuti").click(function () {
      const jencut = $("#jencut").val();
      if (jencut == 'Cuti Tahunan') {
        $.ajax({
          type: 'get',
          dataType: 'html',
          success: function () {
            $("#totalCuti").attr('max', '12');
          }
        });
      } else if (jencut == 'Cuti Melahirkan') {
        $.ajax({
          type: 'get',
          dataType: 'html',
          success: function () {
            $("#totalCuti").attr('max', '90');
          }
        });
      } else if (jencut == 'Cuti Sakit') {
        $.ajax({
          type: 'get',
          dataType: 'html',
          success: function () {
            $("#totalCuti").attr('max', '3');
          }
        });
      } else {
        $.ajax({
          type: 'get',
          dataType: 'html',
          success: function () {
            $("#totalCuti").removeAttr('max');
          }
        });
      }
    });

  });
</script>
@endsection