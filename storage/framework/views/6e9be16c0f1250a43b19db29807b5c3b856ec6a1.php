<?php $__env->startSection('title', 'Daftar Karyawan'); ?>

<?php $__env->startSection('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Data Karyawan</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Stream</th>
                      <th>Akun</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr align="center">
                      <td><?php echo e($loop->iteration); ?></td>
                      <td><?php echo e($k->nip); ?></td>
                      <td><?php echo e($k->nama); ?></td>
                      <td><?php echo e($k->jenkel); ?></td>
                      <td><?php echo e($k->Stream['stream']); ?></td>
                      <?php if($k->is_active == 0): ?>
                      <td><span class="badge badge-danger">Tidak Aktif</span></td>
                      <?php else: ?>
                      <td><span class="badge badge-success">Aktif</span></td>
                      <?php endif; ?>
                      <td>
                        <form action="<?php echo e(url('/admin/karyawan/aktivasi/' . $k->id)); ?>" method="POST" class="d-inline">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('patch'); ?>
                          <button name="aktivasi" class="btn btn-success btn-sm" value="1" onclick="return confirm('Aktivasi akun ini?')"><i class="fa fa-check-circle"></i></button>
                        </form>
                        <a href="<?php echo e(url('/admin/karyawan/' . $k->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i></a>
                        <a href="<?php echo e(url('/admin/karyawan/edit/' . $k->id)); ?>" class="btn btn-warning btn-sm" onclick="return confirm('Yakin?')"><i class="fa fa-edit"></i></a>
                        <form action="<?php echo e(url('/admin/karyawan/' . $k->id)); ?>" method="POST" class="d-inline">
                          <?php echo method_field('delete'); ?>
                          <?php echo csrf_field(); ?>
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i></button>
                        </form>
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

      </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Prakerin\projek_pkl\Program_Cuti\dev-project\resources\views/admin/karyawan/index.blade.php ENDPATH**/ ?>