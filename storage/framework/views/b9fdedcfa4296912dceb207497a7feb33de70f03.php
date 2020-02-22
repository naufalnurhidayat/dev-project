<?php $__env->startSection('title', 'Data Barang'); ?>

<?php $__env->startSection('content'); ?>


<?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  
  <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
  <a href="/" class="btn btn-danger mb-2">Kembali</a>
<a href="<?php echo e(url('/invetaris/pengajuan')); ?>" class="btn btn-primary mb-2">Pengajuan</a>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
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
           <tr align="center"> 
           <td><?php echo e($box->nama_barang); ?></td> 
           <td><?php echo e($box->Kategori->nama_kategori); ?></td>
           <td><?php echo e($box->stok); ?></td>
           <td><?php echo e($box->type); ?></td>
           <td><?php echo e($box->kondisi); ?></td>
           <td>
           <a href="<?php echo e(url('/show')); ?>/<?php echo e($box->id_barang); ?>" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> Detail</a>
           <a href="<?php echo e(url('/pinjam/create')); ?>/<?php echo e($box->id_barang); ?>" class="btn btn-success btn-sm"><i class="fa fa-book"></i> Pinjam</a>
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
<?php echo $__env->make('templates/template-home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/Invetaris/barang.blade.php ENDPATH**/ ?>