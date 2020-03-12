
@foreach($cuti as $c)
  <tr align="center">
    <td>{{ $loop->iteration }}</td>
    <td>{{ $c->User['nama'] }}</td>
    <td>{{ $c->tgl_cuti }}</td>
    <td>{{ $c->jenis_cuti['jenis_cuti'] }}</td>
    <td>
      @if ($c->status == "Diterima")
          <span class="badge badge-success">{{ $c->status }}</span>
      @elseif ($c->status == "Ditolak")
          <span class="badge badge-danger">{{ $c->status }}</span>
      @else
          <span class="badge badge-warning">{{ $c->status }}</span>
      @endif
    </td>
    <td>
      @if ($c->status == "Diterima" || $c->status == "Ditolak")
        <a href="{{url('/admin/cuti/detail/'.$c->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> <b>Detail</b></a>    
      @else
        <form action="{{url('/admin/cuti/'.$c->id)}}" method="post">
          @csrf
          @method('patch')
          <a href="{{url('/admin/cuti/detail/'.$c->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i></a>
          <button class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin menerima?');" type="submit" name="status" value="Diterima"><i class="fa fa-check"></i></button>
          <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menolak?');" type="submit" name="status" value="Ditolak"><i class="fa fa-times-circle"></i></button>
        </form>
      @endif
    </td>
  </tr>
@endforeach