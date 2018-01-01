@extends('layouts.master')

@section('main-content')
<style type="text/css">
	.post-container {
	    margin: 1px;
	}
	.post-thumb {
	    float: left
	}
	.post-thumb img {
	    display: block;
	    max-height:150px;
	    max-width:150px;
	    margin-top:10px;
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
	h6.date-comment {
		margin-left: 0px;
		font-size: 10px;
	}
	hr{
		margin: 5px;
	}
	h4.post-title {
		margin-bottom: 0px;
	}
	img {
	    max-width: 40%;
	    max-height: 100px;
	}
</style>
	@if(count($articles)>0)
		@foreach($articles as $data)
		<div class="row box-content">
			<div class="col-md-12">
				<div class="box-body">
					<h4 class="post-title">{{ $data->title }}</h4>
					<h6 class="date-comment"><i class="fa fa-user"></i> {{ ucwords($data->user->name) }} &nbsp;&nbsp;<i class="fa fa-calendar"></i> {{ date('d M Y', strtotime($data->created_at)) }} &nbsp;&nbsp;<i class="fa fa-comments"> {{ $data->comment->count() }}</i></h6>
					<div class="post-container">
						<div class="post-thumb"><img src="{{ asset('/images/'.$data->header_pic)  }}" class="img-responsive" width="304" height="236"></div>
					    <div class="post-content">
					        <p><?php echo substr($data->content, 0, 300); ?><a href="{{ '/article/'.$data->id.'/show' }}">Read more...</a></p>
					   </div>
					</div>
				</div>
				<div class="text-center">
					{{ $articles->links() }}
				</div>
			</div>
		</div>
		@endforeach
	@else
		<div class="text-center" id="not_found">Data not Available</div>
	@endif
@endsection