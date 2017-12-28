<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<div class="panel-heading"><?php echo e($article->title); ?></div>
				<div class="panel-body">
            		<?php echo e($article->updated_at); ?>

            		<?php echo e($article->body); ?>


            		<?php if(count($errors) > 0): ?>
                		<div class="alert alert-danger">
                    		<strong>操作失败</strong> 输入不符合要求<br><br>
                    		<?php echo implode('<br>', $errors->all()); ?>

                		</div>
            		<?php endif; ?>

                	<form action="<?php echo e(url('comment')); ?>" method="POST">
                    	<?php echo csrf_field(); ?>

                    	<input type="hidden" name="article_id" value="<?php echo e($article->id); ?>">
                        <label>Nickname</label>
                        <input type="text" name="nickname" class="form-control" required="required">
						<br>
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" >
						<br>
                        <label>Home page</label>
                        <input type="text" name="website" class="form-control" >
						<br>
                        <label>Content</label>
                        <textarea name="content" id="newFormContent" class="form-control" rows="3" required="required"></textarea>
						<br>
                    	<button type="submit" class="btn btn-lg btn-success">提交</button>
                	</form>

            	<script>
            	function reply(a) {
              		var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
              		var textArea = document.getElementById('newFormContent');
              		textArea.innerHTML = '@'+nickname+' ';
            	}
            	</script>
				
				<br>

                <?php $__currentLoopData = $article->hasManyComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<hr>
                    <div class="nickname" data="<?php echo e($comment->nickname); ?>">
                    	<?php if($comment->website): ?>
                        	<a href="<?php echo e($comment->website); ?>">
                            	<h3><?php echo e($comment->nickname); ?></h3>
                            </a>
                        <?php else: ?>
                                <h3><?php echo e($comment->nickname); ?></h3>
                        <?php endif; ?>
                            	<h6><?php echo e($comment->created_at); ?></h6>
                    </div>
                    <div class="content">
                    	<p style="padding: 20px;">
                        	<?php echo e($comment->content); ?>

                        </p>
                    </div>
                    <div class="reply">
                    	<a href="#new" onclick="reply(this);">回复</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>