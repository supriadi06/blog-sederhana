<?php $__env->startSection('main-content'); ?>
<style type="text/css">
	.post-thumb {
	    float: left
	}
	.post-content {
	    margin-left: 160px
	}
	.post-title {
	    font-weight: bold;
	    font-size: 200%
	}
	.box-content{
		margin: 1px;
		border: 2px solid #EFF0F1;

	}
	.post-thumb {
		margin: 2px;
		border: 1px solid #EFF0F1;
	}
	#not_found {
		margin-top: 20px;
	}
	.body-comment {
		background-color: #DCDCDC;
		padding: 5px;
	}
	h6.date-comment {
		margin: 0px;
		font-size: 8px;
	}
	#comment {
		margin-top: 3px;
		margin-bottom: 3px;
	}
	h6.date-comments {
		margin-left: 0px;
		font-size: 10px;
	}
	img {
	    max-width: 100%;
	    max-height: 250px;
	}
	#reply {
		margin: 0px 5px 0px 0px; 
	}
</style>

<div class="row box-content">
		<div class="col-md-12">
			<div class="box-body">
				<h3 class="text-bold"><?php echo e($article->title); ?></h3>
			</div>
			<h6 class="date-comments"><i class="fa fa-user"></i> <?php echo e(ucwords($article->user->name)); ?> &nbsp;&nbsp;<i class="fa fa-calendar"></i> <?php echo e(date('d M Y', strtotime($article->created_at))); ?> <i class="fa fa-comments"> <?php echo e(count($count)); ?></i></h6>
		<div class="post-thumb"><img src="<?php echo e(asset('/images/'.$article->header_pic)); ?>" class="img-responsive" width="304" height="236"></div>
			<?php echo $article->content; ?>
		</div>	
</div>
<input type="hidden" id="articleId" value = "<?php echo e($article->id); ?>">
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" action="<?php echo e(route('article.store', $article->id)); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

			<h5><b><u>Komentar :</u></b></h5>
			<div class="box-body" id="body-comment">
				<div class="form-group">
			      <div class="col-sm-8">
			        <textarea id="comment" name="comment" rows="4" cols="80" class="form-control" placeholder="Komentar"></textarea>
			      </div>
			    </div>
				<div class="form-group">
		          <div class="col-sm-4">
		            <input type="text" name="name" class="form-control" id="name" placeholder="Nama (*)" required>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-sm-4">
		            <input type="email" name="email" class="form-control" id="email" placeholder="Email (*)" required>
		          </div>
		        </div>
			</div>
			<input type="hidden" name="commentType" class="commentType" value = "0">
			<div class="box-footer">
			    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Kirim</button>
			</div>
			<hr>
			<div class="flash-message">
			<?php $__currentLoopData = ['danger','warning','success','info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(Session::has('alert-'.$pesan)): ?>
				<p class="alert alert-<?php echo e($pesan); ?> text-center">
					<?php echo e(Session::get('alert-'.$pesan)); ?>

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		</form>
	</div>
</div>

<?php if(count($comments) >0): ?>
	<div class="row">
		<div class="col-md-12">
			<h5><b><u>(<?php echo e(count($count)); ?>) Komentar yang lain: </u></b></h5>
			<div class="box-body">
				<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="body-comment" id="comment">
					<input type="hidden" class="commentId" value = "<?php echo e($comment->id); ?>">	
					<i class="fa fa-user"></i> <?php echo e(ucwords($comment->visitor->name)); ?>

					<h6 class="date-comment"><i class="fa fa-calendar"></i> <?php echo e(date('d M Y', strtotime($comment->created_at))); ?></h6>
					<br>
						<?php echo $comment->comments; ?><br>
						<a role="button"><h6 class="text-right reply"><i><b>Reply</b></i></h6></a> 
					</div>
					<div class="place-reply"></div>
						<?php $__currentLoopData = $comment->child()->whereRaw("is_show = 't'")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="body-comment indent" style="width:95%;margin-left: 5%;margin-bottom: 2px;">
								<input type="hidden" class="commentId" value = "<?php echo e($comment->id); ?>">	
								<i class="fa fa-user"></i> <?php echo e(ucwords($reply->visitor->name)); ?>

								<h6 class="date-comment"><i class="fa fa-calendar"></i> <?php echo e(date('d M Y', strtotime($comment->created_at))); ?></h6>
								<?php echo e($reply->comments); ?>

								<a role="button"><h6 class="text-right reply"><i><b>Reply</b></i></h6></a> 
							</div>
							<div class="place-reply" style="width:95%;margin-left: 5%;"></div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="text-center">
				<?php echo e($comments->links()); ?>

			</div>
		</div>
	</div>

	<div class="reply-form" style="display: none;">
		<div class="row">
			<div class="col-md-12">
				<form class="form-horizontal" action="<?php echo e(route('article.store', $article->id)); ?>" method="POST">
					<?php echo e(csrf_field()); ?>

					<div class="box-body" id="body-comment">
						<div class="form-group">
					      <div class="col-sm-8">
					        <textarea id="comment" name="comment" rows="4" cols="80" class="form-control" placeholder="Komentar"></textarea>
					      </div>
					    </div>
						<div class="form-group">
				          <div class="col-sm-4">
				            <input type="text" name="name" class="form-control" id="name" placeholder="Nama (*)" required>
				          </div>
				        </div>
				        <div class="form-group">
				          <div class="col-sm-4">
				            <input type="email" name="email" class="form-control" id="email" placeholder="Email (*)" required>
				          </div>
				        </div>
					</div>
					<input type="hidden" name="replyArticleId" class="replyArticleId" value = "">
					<input type="hidden" name="replyCommentId" class="replyCommentId" value = "">
					<input type="hidden" name="commentType" class="commentType" value = "1">
					<div class="box-footer">
					    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Kirim</button>
					</div>
				</form>
			</div>
		</div>
		<br/>
		<br/>
	</div>

<?php endif; ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.reply').click(function(){
			$('.reply-form').hide() //hide all reply form div before show new one

			var elm = $(this).parentsUntil('div').parent().next('.place-reply');
			elm.html('') //set current place reply html to empty
			var replyArticleId = $('#articleId').val();
			var replyCommentId = $(this).parentsUntil('div').parent().find('.commentId').val();
			$('.reply-form:last').clone().appendTo(elm);
			elm.find('.reply-form').find('.replyArticleId').val(replyArticleId);
			elm.find('.reply-form').find('.replyCommentId').val(replyCommentId);
			elm.find('.reply-form').show();

			return false;
		});
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>