<?php $__env->startSection('main-content'); ?>
	<h1><?php echo e($article->title); ?></h1>
	<hr>
	<?php echo $article->content; ?>
	<hr>
	<h4>Komentar :</h4>
	<form class="form-horizontal" action="<?php echo e(url('/articles/$article/store')); ?>" method="POST">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4 col-md-12">
					<div class="form-group">
		              <div class="col-sm-12">
		                <input type="text" name="name" class="form-control" id="nama" placeholder="Nama (*)" required>
		              </div>
		            </div>
				</div>
				
				<div class="col-md-4 ">
					<div class="form-group">
		              <div class="col-sm-12">
		                <input type="email" name="email" class="form-control" id="email" placeholder="Email (*)" required>
		              </div>
		            </div>
				</div>
				<div class="col-md-8 col-md-12">
					<div class="comment-box">
						<textarea name="comment" rows="6" cols="80" class="form-control" placeholder="Komentar"></textarea>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<button type="submit" class="btn btn-info full-right">Kirim</button>
		<hr>
	</form>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>