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
 
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      Kategori
      <select name="" id="">
        <option value="">--Pilih Kategori--</option>
        <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($k->id_kategori); ?>"><?php echo e($k->nama_kategori); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Barang</th>
              <th>Nama Kategori</th>
              <th>Stok</th>
              <th>Tipe</th>
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
           <a href="<?php echo e(url('/show')); ?>/<?php echo e($box->id_barang); ?>" class="badge badge-primary">Detail</a>
           <a href="<?php echo e(url('/pinjam/create')); ?>" class="badge badge-success">Pinjam</a>
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
<?php echo $__env->make('templates/template-invetaris', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/Invetaris/barang.blade.php ENDPATH**/ ?>