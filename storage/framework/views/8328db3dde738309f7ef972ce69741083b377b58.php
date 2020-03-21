<?php $__env->startSection('title', 'Daftar Pendidikan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
		<div class="col">
      <h3>Form Tambah Pendidikan</h3>
    </div>
	</div>
  <div class="row">
    <div class="col-4">
      <form method="post" action="<?php echo e(url('/admin/pendidikan')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
          <label for="pendidikan">Pendidikan</label>
          <input type="text" class="form-control <?php $__errorArgs = ['pendidikan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="pendidikan" name="pendidikan" value="<?php echo e(old('pendidikan')); ?>" autofocus>
          <?php $__errorArgs = ['pendidikan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <a href="<?php echo e(url('/admin/pendidikan')); ?>" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/admin/pendidikan/create.blade.php ENDPATH**/ ?>