
@php $i=1; @endphp
@foreach($cuti as $c)
  @if ($c->id_karyawan != auth()->user()->id)                  
    <tr align="center">
      <td>{{ $i++ }}</td>
      <td>{{ $c->User['nama'] }}</td>
      <td>{{ $c->User->stream['stream'] }}</td>
      @php $newTgl_cuti = explode(' ', $c->tgl_cuti); @endphp
      <td>{{ $newTgl_cuti[0] }}</td>
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
        @if ($c->user->role->role == 'Admin' || $c->user->role->role == 'Scrum Master' || $c->status == "Diterima" || $c->status == "Ditolak")
          <a href="{{url('/sm/cuti/detail/'.$c->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> <b>Detail</b></a>    
        @else
          <a href="{{url('/sm/cuti/detail/'.$c->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i></a>
          <!-- Alasan Terima Modal-->
            <a class="btn btn-success btn-sm" href="" data-toggle="modal" data-target=".terima-cuti-{{$c->id}}"><i class="fa fa-check"></i></a>
            <div class="modal fade terima-cuti-{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Yakin Ingin Menerima</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form action="{{url('/sm/cuti/'.$c->id)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <textarea class="form-control" name="alasan_terima" placeholder="Masukan Alasan Anda" cols="30" rows="3" autocomplete="off"></textarea> 
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button class="btn btn-success" type="submit" name="status" value="Diterima">Terima</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          <!-- Alasan TOlak Modal-->
            <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target=".tolak-cuti-{{$c->id}}"><i class="fa fa-times-circle"></i></a>
            <div class="modal fade tolak-cuti-{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Yakin Ingin Menolak</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form action="{{url('/sm/cuti/'.$c->id)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <textarea class="form-control" name="alasan_tolak" placeholder="Masukan Alasan Anda" cols="30" rows="3" autocomplete="off"></textarea> 
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button class="btn btn-danger" type="submit" name="status" value="Ditolak">Tolak</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        @endif
      </td>
    </tr>
  @endif
@endforeach