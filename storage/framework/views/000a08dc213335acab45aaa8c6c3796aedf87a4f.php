<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">评论管理</div>

				<div class="panel-body">
					<?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php echo implode('<br>', $errors->all()); ?>

                        </div>
                    <?php endif; ?>

					<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<label>评论内容</label><br>
						<?php echo e($comment->content); ?><br><br>
						<label>评论用户</label><br>
						<?php echo e($comment->nickname); ?><br>
						<?php echo e($comment->email); ?><br><br>
						<label>被评文章</label><br>
						<a href="<?php echo e(url('article/'.$comment->article_id)); ?>"><?php echo e($comment->article_id); ?></a><br>
						<a href="<?php echo e(url('admin/comments/'.$comment->id.'/edit')); ?>" class="btn btn-success">编辑</a>
						<form action="<?php echo e(url('admin/comments/'.$comment->id)); ?>" method="POST" style="display: inline;">
							<?php echo e(method_field('DELETE')); ?>

							<?php echo e(csrf_field()); ?>

							<button type="submit" class="btn btn-danger">删除</button>
						</form>
						<hr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>