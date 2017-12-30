<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						文件管理
					</h3>
				</div>
				<div class="panel-body">

					<a href="<?php echo e(url('admin/files/create')); ?>" class="btn btn-lg btn-primary">上传</a>

					<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<hr>
						<div class="file">
							<p>
								<?php echo e($file); ?>

							</p>
							<a href="<?php echo e(url('storage/'.$file)); ?>" class="btn btn-success">查看</a>
							<form action="<?php echo e(url('admin/files/'.$file)); ?>" method="POST" style="display: inline;">
								<?php echo e(method_field('DELETE')); ?>

								<?php echo e(csrf_field()); ?>

								<input type="hidden" name="fileName" value="<?php echo e($file); ?>">
								<button type="submit" class="btn btn-danger">删除</button>
							</form>
						</div>

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>