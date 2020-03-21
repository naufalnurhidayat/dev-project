@foreach($kembali as $k)
           <tr align="center"> 
           <td>{{$k->User['nip']}}</td>
           <td>{{$k->User['nama']}}</td> 
           <td>{{$k->Barang['nama_barang']}}</td>
           <td>{{$k->tgl_kembali}}</td>
           <td>@if( $k->status_kembali == "Belum" )
            <span class="badge badge-warning btn-sm">Belum Kembali</span>
           @else
            <span class="badge badge-success btn-sm">Sudah Kembali</span>
           @endif
       </td>
           <td>
            <form action="{{url('/admin/kembali/status/'. $k->id_kembali)}}" method="post">
              @method('patch')
              @csrf
              @if ($k->status_kembali == "Belum" )
               <button class="btn btn-success rounded-circle" name="status_kembali" value="success"><i class="fas fa-check"></i></button>
              @else
              @endif  
              </form>
           </td>
           </tr>
           @endforeach