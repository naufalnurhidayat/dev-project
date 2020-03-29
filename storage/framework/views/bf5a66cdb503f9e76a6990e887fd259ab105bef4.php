<?php $__env->startSection('title', 'Halaman Cuti'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
  <!-- Page Heading -->
  <?php if(session('status')): ?>
    <div class="alert alert-success">
      <?php echo e(session('status')); ?>

    </div>
  <?php endif; ?>
  <?php if(session('jatah')): ?>
    <div class="alert alert-danger">
      <?php echo e(session('jatah')); ?>

    </div>
  <?php endif; ?>
  <a href="<?php echo e(url('/cuti/create')); ?>" class="btn btn-primary mb-3"><i class="fas fa-calendar-plus">&nbsp; Buat Pengajuan Cuti</i></a>
<!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary d-inline">Data Cuti Anda</h5>
      <h6 class="float-right text-info font-weight-bold mt-1"><?php $user = auth()->user()->jatah_cuti; ?>
        Sisa Cuti :
        <?php if($user == 0): ?>
            <span class="text-danger"><?php echo e($user); ?></span>
        <?php else: ?>
            <span class="text-success"><?php echo e($user); ?></span>
        <?php endif; ?>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-dark text-white">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Stream</th>
              <th>Tanggal Pengajuan Cuti</th>
              <th>Jenis Cuti</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="table table-bordered">
            <?php $__currentLoopData = $cuti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr align="center">
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($c->User['nama']); ?></td>
                <td><?php echo e($c->User['jenkel']); ?></td>
                <td><?php echo e($c->User->Stream['stream']); ?></td>
                <td><?php echo e($c->tgl_cuti); ?></td>
                <td><?php echo e($c->jenis_cuti['jenis_cuti']); ?></td>
                <td>
                  <?php if($c->status == 'Diterima'): ?>
                    <span class="badge badge-success"><?php echo e($c->status); ?></span>
                  <?php elseif($c->status == 'Ditolak'): ?>
                    <span class="badge badge-danger"><?php echo e($c->status); ?></span>
                  <?php else: ?>                          
                    <span class="badge badge-warning"><?php echo e($c->status); ?></span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if($c->status === 'Diterima'): ?>
                    <a class="btn btn-primary btn-block" href="#" data-toggle="modal" data-target="#tambahCuti" id="modalTambahCuti">
                      <i class="fas fa-calendar-plus"></i> Tambah Cuti
                    </a>
                    <!-- Tambah Cuti Modal-->
                    <div class="modal fade" id="tambahCuti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Cuti</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                            <div class="modal-body">
                              <form action="<?php echo e(url('/cuti/'.$c->id)); ?>" method="post">
                                <?php echo method_field('patch'); ?>
                                <?php echo csrf_field(); ?>
                                <input type="text" value="<?php echo e($c->id); ?>">
                                <div class="form-group">
                                  <label for="karyawan">Karyawan</label>
                                  <input type="text" class="form-control <?php $__errorArgs = ['karyawan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="karyawan" id="karyawan" value="<?php echo e(auth()->user()->nama); ?>" readonly>
                                  <?php $__errorArgs = ['karyawan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                  <label for="jencut">Jenis Cuti</label>
                                  <input type="text" class="form-control <?php $__errorArgs = ['jencut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="jencut" id="jencut" value="<?php echo e($c->jenis_cuti['jenis_cuti']); ?>" readonly>
                                  <?php $__errorArgs = ['jencut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group row">
                                  <div class="col-6">
                                    <label for="datePickerAwalCuti">Awal Cuti</label>
                                    <input type="text" readonly class="form-control <?php $__errorArgs = ['awal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="awal" id="datePickerAwalCuti" value="<?php echo e($c->awal_cuti); ?>">
                                    <?php $__errorArgs = ['awal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                  </div>
                                  <div class="col-6">
                                    <label for="datePickerAkhirCuti">akhir Cuti</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['akhir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="akhir" id="datePickerAkhirCuti" value="<?php echo e($c->akhir_cuti); ?>">
                                    <?php $akhir_cuti = explode('-', $c->akhir_cuti) ?>
                                    <input type="hidden" value="<?php echo e($akhir_cuti[0]); ?>" id="thnAkhirCuti">
                                    <input type="hidden" value="<?php echo e($akhir_cuti[1]); ?>" id="blnAkhirCuti">
                                    <input type="hidden" value="<?php echo e($akhir_cuti[2]); ?>" id="tglAkhirCuti">
                                    <?php $__errorArgs = ['akhir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                <button class="btn btn-primary" type="submit">Tambah Cuti</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script>
  $(document).ready(function(){
    $("#modalTambahCuti").click(function () {
      const thnAkhirCuti = $("#thnAkhirCuti").val();
      const blnAkhirCuti = $("#blnAkhirCuti").val();
      const tglAkhirCuti = $("#tglAkhirCuti").val();
      const pickerAwalCuti = datepicker('#datePickerAwalCuti', {
        minDate: new Date(thnAkhirCuti, blnAkhirCuti-1, tglAkhirCuti),
        noWeekends: true
      });
      const pickerAkhirCuti = datepicker('#datePickerAkhirCuti', {
        minDate: new Date(thnAkhirCuti, blnAkhirCuti-1, tglAkhirCuti),
        noWeekends: true
      });
    });
      $("#thnAkhirCuti").hide();
      $("#blnAkhirCuti").hide();
      $("#tglAkhirCuti").hide();
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Prakerin\projek_pkl\Program_Cuti\dev-project\resources\views/cuti/index.blade.php ENDPATH**/ ?>