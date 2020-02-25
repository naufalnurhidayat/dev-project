<?php $__env->startSection('title', 'Absen'); ?>

<?php $__env->startSection('content'); ?>


<div class="container">
  <?php if(session('status')): ?>
      <div class="alert alert-success">
          <?php echo e(session('status')); ?>

      </div>
      <?php endif; ?>
  <?php if(session('danger')): ?>
      <div class="alert alert-danger">
          <?php echo e(session('danger')); ?>

      </div>
  <?php endif; ?>
  <div class="row mt-3">
        <div class="col">
            <div class="jumbotron mx-auto text-center">
                <h1 class="display-3">Hallo, <?php echo e(auth()->user()->nama); ?>!</h1>
                <p class="lead">Selamat datang di fitur absensi (Divisi Digital Service) PT Telekomunikasi Indonesia</p>
                <hr class="my-4">
                <p>Silahkan klik tombol ceklist jika anda ingin absen. Silahkan klik tanda seru jika tidak hadir. Silahkan klik tombol 'i' jika ingin kembali ke home.</p>
                <a href="" class="btn btn-success btn-circle btn-lg" data-toggle="modal" data-target="#absenmodal">
                    <i class="fas fa-check"></i>
                </a>
                <a href="" class="btn btn-warning btn-circle btn-lg" data-toggle="modal" data-target="#izinmodal">
                    <i class="fas fa-exclamation-triangle"></i>
                </a>
                <a href="<?php echo e(url('/')); ?>" class="btn btn-info btn-circle btn-lg">
                    <i class="fas fa-info-circle"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Pukul</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $absen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr align="center">
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($a->Karyawan['nip']); ?></td>
                <td><?php echo e($a->Karyawan['nama']); ?></td>
                <td><?php echo e($a->Karyawan->Role['role']); ?></td>
                <td><?php echo e($a->jam_masuk); ?></td>
                <td><?php echo e($a->tanggal); ?></td>
                <td><?php echo e($a->catatan); ?></td>
                <td><?php echo e($a->status); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="absenmodal" tabindex="-1" role="dialog" aria-labelledby="absenmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="absenmodal">Yakin ingin absen?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik 'Absen' jika ingin absen.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <form action="<?php echo e(url('/absen')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button class="btn btn-primary" type="submit">Absen</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="izinmodal" tabindex="-1" role="dialog" aria-labelledby="izinmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="izinmodal">Tidak masuk?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo e(url('/absen')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="modal-body">
            <div class="form-group">
              <input type="text" name="catatan" placeholder="Keterangan..." class="form-control <?php $__errorArgs = ['catatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="izin">
              <?php $__errorArgs = ['catatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input <?php $__errorArgs = ['picture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="picture" name="picture">
              <label class="custom-file-label" for="picture">Lampirkan surat keterangan</label>
              <?php $__errorArgs = ['picture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <button name="izin" class="btn btn-primary" type="submit" value="izin">Izin</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/absen/index.blade.php ENDPATH**/ ?>