@extends('templates/template-po')

@section('title', 'Form Pengajuan Cuti')

@section('content')
    <div class="container">
      @if (session('status'))
        <div class="alert alert-danger">
          {{ session('status') }}
        </div>
      @endif
      <div class="row mx-auto">
        <div class="col">
          <h3 class="mb-4"><i class="fas fa-calendar-alt"></i> Form Pengajuan Cuti</h3>
          <form action="{{ url('/po/cuti') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="karyawan">Karyawan</label>
              <input type="text" class="form-control @error('karyawan') is-invalid @enderror" name="karyawan" id="karyawan" value="{{auth()->user()->nama}}" readonly>
              @error('karyawan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
              <label for="jencut">Jenis Cuti</label>
              <select  class="form-control @error('jencut') is-invalid @enderror" name="jencut" id="jencut">
                  <option value="">-- Pilih Jenis Cuti --</option>
                @foreach ($jencut as $j)
                  <option value="{{$j->id}}">{{$j->jenis_cuti}}</option>
                @endforeach
              </select>
              @error('jencut')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="awal">Awal Cuti</label>
                <input type="text" autocomplete="off" readonly class="form-control @error('awal') is-invalid @enderror" name="awal" id="datePickerAwalCuti" value="{{ old('awal') }}">
                @error('awal')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-6">
                <label for="akhir">akhir Cuti</label>
                <input type="text" autocomplete="off" readonly class="form-control @error('akhir') is-invalid @enderror" name="akhir" id="datePickerAkhirCuti" value="{{ old('akhir') }}">
                @error('akhir')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-group">
              <label for="totalCuti">Total Cuti</label>
              <input type="number" min="1" class="form-control @error('totalCuti') is-invalid @enderror" name="totalCuti" id="totalCuti" value="{{ old('totalCuti') }}">
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

    $("#jencut").change(function () {
      const jencut = $("#jencut").val();
      if (jencut == 1) {
        $.ajax({
          type: 'get',
          dataType: 'html',
          success: function () {
            $("#totalCuti").attr('max', '12');
          }
        });
      } else if (jencut == 2) {
        $.ajax({
          type: 'get',
          dataType: 'html',
          success: function () {
            $("#totalCuti").attr('max', '90');
          }
        });
      } else if (jencut == 3) {
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