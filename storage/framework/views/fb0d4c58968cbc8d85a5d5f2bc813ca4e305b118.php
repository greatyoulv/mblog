<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">编辑评论</div>
				<div class="panel-body">
					<?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php echo implode('<br>', $errors->all()); ?>

                        </div>
                    <?php endif; ?>

					<form action="<?php echo e(url('admin/comments/'.$comment->id)); ?>" method="POST">
						<?php echo e(method_field('PUT')); ?>

						<?php echo csrf_field(); ?>

						
						<input type="hidden" name="article_id" value="<?php echo e($comment->article_id); ?>">
                        <label>Nickname</label>
                        <input type="text" name="nickname" class="form-control" required="required" value="<?php echo e($comment->nickname); ?>">
                        <br>
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" required="required" value="<?php echo e($comment->email); ?>">
                        <br>
                        <label>Home page</label>
                        <input type="text" name="website" class="form-control" required="required" value="<?php echo e($comment->website); ?>">
                        <br>
                        <label>Content</label>
                        <textarea name="content" class="form-control" rows="10" required="required"><?php echo e($comment->content); ?></textarea>
                        <br>
						<button class="btn btn-lg btn-info">提交修改</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>