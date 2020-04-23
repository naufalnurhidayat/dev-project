@extends('templates/template-po')

@section('title', 'Form Pengajuan Cuti')

@section('content')
    <div class="container mb-5">
      @if (session('status'))
        <div class="alert alert-danger">
          {{ session('status') }}
        </div>
      @endif
      <div class="row mx-auto">
        <div class="col">
          <h4 class="mb-4"><i class="fas fa-calendar-alt"></i> Form Pengajuan Cuti</h4>
          <form action="{{ url('/po/cuti') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="karyawan">Karyawan</label>
              <input type="text" class="form-control @error('karyawan') is-invalid @enderror" name="karyawan" id="karyawan" value="{{auth()->user()->nama}}" readonly>
              @error('karyawan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
              <label for="jencut">Jenis Cuti</label>
              <select  class="form-control @error('Jenis_Cuti') is-invalid @enderror" name="Jenis_Cuti" id="jencut">
                  <option value="">-- Pilih Jenis Cuti --</option>
                @foreach ($jencut as $j)
                  <option value="{{$j->id}}">{{$j->jenis_cuti}}</option>
                @endforeach
              </select>
              @error('Jenis_Cuti')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="datePickerAwalCuti">Awal Cuti</label>
                <input type="text" autocomplete="off" readonly class="form-control @error('Awal_Cuti') is-invalid @enderror" name="Awal_Cuti" id="datePickerAwalCuti" value="{{ old('Awal_Cuti') }}">
                @error('Awal_Cuti')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-6">
                <label for="datePickerAkhirCuti">Akhir Cuti</label>
                <input type="text" autocomplete="off" readonly class="form-control @error('Akhir_Cuti') is-invalid @enderror" name="Akhir_Cuti" id="datePickerAkhirCuti" value="{{ old('Akhir_Cuti') }}">
                @error('Akhir_Cuti')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-group">
              <label for="totalCuti">Total Cuti</label>
              <input type="number" min="1" class="form-control @error('Total_Cuti') is-invalid @enderror" name="Total_Cuti" id="totalCuti" value="{{ old('Total_Cuti') }}">
              @error('Total_Cuti')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
              <label for="alasan">Alasan Cuti</label>
              <textarea class="form-control @error('Alasan_Cuti') is-invalid @enderror" name="Alasan_Cuti" id="alasan" rows="3">{{ old('Alasan_Cuti') }}</textarea>
                @error('Alasan_Cuti')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-success float-right">Submit</button>
            <a href="{{url('/po/cuti')}}" class="btn btn-danger float-right mr-2">Kembali</a>
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