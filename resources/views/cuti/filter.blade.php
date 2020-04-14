
@foreach ($cuti as $c)
  <tr align="center">
    <td>{{ $loop->iteration }}</td>
    <td>{{ $c->User['nama'] }}</td>
    <td>{{ $c->User['jenkel'] }}</td>
    <td>{{ $c->User->Stream['stream'] }}</td>
    @php $newTgl_cuti = explode(' ', $c->tgl_cuti); @endphp
    <td>{{ $newTgl_cuti[0] }}</td>
    <td>{{ $c->jenis_cuti['jenis_cuti'] }}</td>
    <td>
      @if ($c->status == 'Diterima')
        <span class="badge badge-success">{{ $c->status }}</span>
      @elseif($c->status == 'Ditolak')
        <span class="badge badge-danger">{{ $c->status }}</span>
      @else                          
        <span class="badge badge-warning">{{ $c->status }}</span>
      @endif
    </td>
    <td>
      <a href="{{url('/cuti/'.$c->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> <b>Detail</b></a>
    </td>
  </tr>
@endforeach