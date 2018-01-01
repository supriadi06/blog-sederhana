<?php $__env->startSection('main-content'); ?>
<aside class="right-side">
	<section class="content-header">
		<h2>Articles</h2>
	</section>
	<section class="content">
		<div class="row"></div>
			<div class="panel panel-default">
			  	<div class="panel-heading clearfix">
			  		<h3 class="panel-title pull-left">Edit Article</h3>
					<div class="pull-right">
						
					</div>
				</div>
			  <div class="panel-body">
			  	<div class="col-md-12">
		          <!-- Horizontal Form -->
		          <div class="box box-info">
		            <!-- /.box-header -->
		            <!-- form start -->
		            <form class="form-horizontal" action="<?php echo e(route('articles.update', $article->id)); ?>" method="POST" enctype="multipart/form-data">
		            	<?php echo e(method_field('PUT')); ?>

		            	<?php echo e(csrf_field()); ?>

		              <div class="box-body">
		                <div class="form-group">
		                  <label for="category_id" class="col-sm-2 control-label">Category</label>
		                  <div class="col-sm-10">
		                    <select name="category_id" data-live-search="true" data-live-search-style="startsWith" class="selectpicker" required>
		                    	<option value="">--Select Category--</option>
		                    	<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                    			<option value="<?php echo e($category->id); ?>" <?php echo ($category->id == $article->category_id) ? ' selected': ''; ?>><?php echo e($category->title); ?></option>
		                    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                    </select>
		                  </div>
		                </div>
		                <div class="form-group">
		                  <label for="header_pic" class="col-sm-2 control-label">Header Picture</label>
		                  <div class="col-sm-10">
		                    <input type="file" name="header_pic" accept="image/*" id="header_pic" value="<?php echo e($article->header_pic); ?>" placeholder="Header Picture">
		                  </div>
		                </div>
		                <div class="form-group">
		                  <label for="title" class="col-sm-2 control-label">Title</label>
		                  <div class="col-sm-10">
		                    <input type="text" name="title" class="form-control" id="title" value="<?php echo e($article->title); ?>" placeholder="Title" required>
		                  </div>
		                </div>
		                <div class="form-group">
		                  <label for="content" class="col-sm-2 control-label">Content</label>
		                  <div class="col-sm-10">
		                    <textarea id="content" name="content" rows="10" cols="80" required><?php echo e($article->content); ?></textarea>
		                  </div>
		                </div>
		                <div class="form-group">
		                  <div class="col-sm-offset-2 col-sm-10">
		                    <div class="checkbox">
		                      <label>
		                        <input name="is_active" type="checkbox" checked> Active
		                      </label>
		                    </div>
		                  </div>
		                </div>
		              </div>
		              <!-- /.box-body -->
		              <div class="box-footer">
		                <a class="btn btn-warning" href="<?php echo e(route('articles.index')); ?>">
							<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Cancel
						</a>
		                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Save</button>
		              </div>
		              <!-- /.box-footer -->
		            </form>
		          </div>
			  </div>
		</div>
	</section>
</aside>
<script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('content')
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>