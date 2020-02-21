<?php $__env->startSection('title', 'Daftar Karyawan'); ?>

<?php $__env->startSection('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
  <?php endif; ?>

    <div class="row mb-3">
        <div class="col">
            <a href="<?php echo e(url('/admin/karyawan/create')); ?>" class="btn btn-primary"><i class="fas fa-plus fa-sm"></i> Tambah Karyawan</a>
        </div>
    </div>
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
                      <th>Role</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr align="center">
                      <td><?php echo e($loop->iteration); ?></td>
                      <td><?php echo e($k->nip); ?></td>
                      <td><?php echo e($k->nama); ?></td>
                      <td><?php echo e($k->jenkel); ?></td>
                      <td><?php echo e($k->Role['role']); ?></td>
                      <td>
                        <a href="<?php echo e(url('/admin/karyawan')); ?>/<?php echo e($k->id); ?>" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> Detail</a>
                        <a href="<?php echo e(url('/admin/karyawan/edit')); ?>/<?php echo e($k->id); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                        <form action="<?php echo e(url('/admin/karyawan')); ?>/<?php echo e($k->id); ?>" method="POST" class="d-inline">
                          <?php echo method_field('delete'); ?>
                          <?php echo csrf_field(); ?>
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
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
<?php echo $__env->make('templates/template-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/admin/karyawan/index.blade.php ENDPATH**/ ?>