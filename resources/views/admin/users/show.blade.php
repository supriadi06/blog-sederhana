@extends('admin.layouts.master')

@section('main-content')

<aside class="right-side">
	<section class="content-header">
		<h2>Users</h2>
	</section>
	<section class="content">
		<div class="row"></div>
			<div class="panel panel-default">
			  	<div class="panel-heading clearfix">
			  		<h3 class="panel-title pull-left">Users profile</h3>
					<div class="pull-right">
						
					</div>
				</div>
			  <div class="panel-body">
			  	<div class="table-responsive">
			  		<table class="table table-bordered table-striped">
			  			<thead>
			  				<tr>
			  					<th class="text-center">ID</th>
			  					<th class="text-center">Email</th>
			  					<th class="text-center">Status</th>
			  				</tr>
			  			</thead>
			  			<tbody>
			  				<tr>
			  					<td class="text-center">{{ $user->id }}</td>
			  					<td>{{ $user->email }}</td>
			  					<td class="text-center"><i class='fa fa-check-square-o'></i> Online</td>
			  				</tr>
			  			</tbody>
			  		</table>
			  	</div>
			  </div>
		</div>
	</section>
</aside>

@endsection