<?php $__env->startSection('title', 'Daftar Role'); ?>

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
            <a href="<?php echo e(url('/createrole')); ?>" class="btn btn-primary"><i class="fas fa-plus fa-sm"></i> Tambah Role</a>
        </div>
    </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Data Role</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Role</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
                  <tr>
                      <td><?php echo e($loop->iteration); ?></td>
                      <td><?php echo e($r->role); ?></td>
                      <td>
                        <a href="<?php echo e(url('/ubahrole')); ?>/<?php echo e($r->id); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> <b>Edit</b></a>
                        <form action="<?php echo e(url('/hapusrole')); ?>/<?php echo e($r->id); ?>" method="POST" class="d-inline">
                          <?php echo method_field('delete'); ?>
                          <?php echo csrf_field(); ?>
                          <button type="submit" class="btn btn-danger btn-sm" name="hapus"><i class="fa fa-trash"></i> <b>Hapus</b></button>
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
<?php echo $__env->make('templates/template-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/admin/role/index.blade.php ENDPATH**/ ?>