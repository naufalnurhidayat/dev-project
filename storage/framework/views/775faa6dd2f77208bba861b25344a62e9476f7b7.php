<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
  <div class="card-body p-0">
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
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col">
        <div class="p-5">
          <div class="text-center">
            <img src="<?php echo e(asset('img/logotelkom.jfif')); ?>" width="25%" class="mb-3 rounded">
            <h1 class="h4 text-gray-900 mb-4">Login</h1>
          </div>
          <form action="<?php echo e(url('/login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <input type="email" class="form-control form-control-user" id="email" placeholder="Email" name="email" >
            </div>
            <div class="form-group row">
              <div class="col mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
              </div>
            </div>
            <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
              Login
            </button>
            <div class="text-center">
              <a href="<?php echo e(url('/registrasi')); ?>">Create an account</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.template-dasar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/login/login.blade.php ENDPATH**/ ?>