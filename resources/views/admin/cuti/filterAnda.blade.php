
@foreach ($cuti as $c)
  <tr align="center">
    <td>{{ $loop->iteration }}</td>
    <td>{{ $c->User['nama'] }}</td>
    <td>{{ $c->User['jenkel'] }}</td>
    <td>{{ $c->tgl_cuti }}</td>
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
    <td><a href="{{url('/admin/cuti/detail/'.$c->id )}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> <b>Detail</b></a></td>
  </tr>
@endforeach