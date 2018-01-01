@extends('admin.layouts.master')

@section('main-content')
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
</style>

<div class="row box-content">
		<div class="col-md-12">
			<div class="box-body">
				<h3 class="text-bold">{{ $article->title }}</h3>
			</div>
		<div class="post-thumb"><img src="{{ asset('/images/'.$article->header_pic)  }}" class="img-responsive" width="304" height="236"></div>
			<?php echo $article->content; ?>
		</div>	
</div>
@endsection