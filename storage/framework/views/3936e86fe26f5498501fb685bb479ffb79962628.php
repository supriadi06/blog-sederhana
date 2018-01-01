<?php $__env->startSection('main-content'); ?>
<aside class="right-side">
	<section class="content-header">
		<h2>Categories</h2>
	</section>
	<section class="content">
		<div class="row"></div>
			<div class="panel panel-default">
			  	<div class="panel-heading clearfix">
			  		<h3 class="panel-title pull-left">Edit Category</h3>
					<div class="pull-right">
						
					</div>
				</div>
			  <div class="panel-body">
			  	<div class="col-md-6">
		          <!-- Horizontal Form -->
		          <div class="box box-info">
		            <!-- /.box-header -->
		            <!-- form start -->
		            <form class="form-horizontal" action="<?php echo e(route('categories.update', $category->id)); ?>" method="POST">
		            	<?php echo e(method_field('PUT')); ?>

		            	<?php echo e(csrf_field()); ?>

		              <div class="box-body">
		                <div class="form-group">
		                  <label for="title" class="col-sm-2 control-label">Title</label>
		                  <div class="col-sm-10">
		                    <input type="text" name="title" value="<?php echo e($category->title); ?>" class="form-control" id="title" placeholder="Title" required>
		                  </div>
		                </div>
		                <div class="form-group">
		                  <div class="col-sm-offset-2 col-sm-10">
		                    <div class="checkbox">
		                      <label>
		                        <input name="is_active" type="checkbox" <?php echo ($category->is_active) ? "checked" : ""; ?>> 
		                      </label>
		                    </div>
		                  </div>
		                </div>
		              </div>
		              <!-- /.box-body -->
		              <div class="box-footer">
		                <a class="btn btn-warning" href="<?php echo e(route('categories.index')); ?>">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>