<?php $__env->startSection('title', 'Data Barang'); ?>

<?php $__env->startSection('content'); ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

  <!-- Page Heading -->
  
  <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
    
    <div class="row mb-3">
        <div class="col">
            <a href="<?php echo e(url('/admin/create')); ?>" class="btn btn-primary">Tambah Barang</a>
        <a href="<?php echo e(url('/kategori/index')); ?>" class="btn btn-warning">Kategori</a>
        </div>
    </div>
    
    <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Barang</th>
              <th>Nama Kategori</th>
              <th>Stok</th>
              <th>Type</th>
              <th>Kondisi</th>  
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $box): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr> 
              <td><?php echo e($box->nama_barang); ?></td> 
              <td><?php echo e($box->Kategori->nama_kategori); ?></td>
              <td><?php echo e($box->stok); ?></td>
              <td><?php echo e($box->type); ?></td>
              <td><?php echo e($box->kondisi); ?></td>
              <td>
              <a href="<?php echo e(url('/admin/barang/edit')); ?>/<?php echo e($box->id_barang); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
              <form class="d-inline" method="post" action="<?php echo e(url('/admin/destroy')); ?>/<?php echo e($box->id_barang); ?>">
                <?php echo e(method_field('DELETE')); ?>

                <?php echo e(csrf_field()); ?>

                <button type="submit" onclick="return confirm('Apakah Anda Yakin ?')" class="text-light btn-sm btn btn-danger btn-sm"><i class="fa fa-trash mr-2"></i>Hapus</button>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/admin/data_barang/index.blade.php ENDPATH**/ ?>