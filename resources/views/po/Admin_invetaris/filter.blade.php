@foreach($pinjam as $p)
<tr align="center"> 
<td>{{$p->User['nip']}}</td>
<td>{{$p->User['nama']}}</td>
<td>{{$p->Barang['nama_barang']}}</td>
<td>{{$p->tgl_pinjam}}</td>
<td>@if( $p->status == "Pending" )
     <span class="badge badge-warning btn-sm">Pending</span>
    @elseif ( $p->status == "Accept" )
     <span class="badge badge-success btn-sm">Accept</span>
    @else
     <span class="badge badge-danger btn-sm">Rejected</span>
    @endif
</td>
<td>
<form method="post" action="{{url('/admin/status')}}/{{$p->id_pinjam}}">
   @method('patch')
   @csrf 
   @if ($p->status == "Pending")
     <button type="submit" onclick="return confirm('Apakah Anda Yakin ?')" name="status" class="btn btn-success rounded-circle btn-sm" value="Accept"><i class="fa fa-check"></i></button>
     <button type="submit" onclick="return confirm('Apakah Anda Yakin ?')" name="status" class="btn btn-danger rounded-circle btn-sm" value="Rejected"><i class="fa fa-times-circle"></i></button>
   @elseif ($p->status == "Accept")
     <button type="button" class="btn btn-success rounded-circle btn-sm"><i class="fa fa-check"></i></button>
   @else
     <button type="button" class="btn btn-danger rounded-circle btn-sm"><i class="fa fa-times-circle"></i></button>
   @endif
 {{-- <a href="{{url('/admin/detail')}}/{{$p->id}}" class="btn btn-primary mt-2"><i class="fa fa-detail">Detail</a> --}}
  </form>
</td>
</tr>
@endforeach