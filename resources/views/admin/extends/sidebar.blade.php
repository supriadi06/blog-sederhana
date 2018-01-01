@if (Auth::guest())

@else
<div class="col-sm-2 sidenav">
	<ul class="nav flex-column flex-nowrap">
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#submenu"><i class="fa fa-file"></i> <span>Static Page</span><i class="fa fa-angle-down pull-right"></i> </a>
            <div class="collapse" id="submenu" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-angle-right"></i> <span> About</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-angle-right"></i> <span> Contact</span></a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/admin/categories') }}"><i class="fa fa-object-group"></i> <span> Category</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/admin/articles') }}"><i class="fa fa-newspaper-o"></i> <span> Articles</span></a></li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#sub-comment"><i class="fa fa-comments"></i> Comments <span class="badge">{{ App\Comment::where('is_show', FALSE)->count() }}</span><i class="fa fa-angle-down pull-right"></i> </a>
            <div class="collapse" id="sub-comment" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/admin/comments/nonapproved') }}"><i class="fa fa-angle-right"></i> Non Approved <span class="badge">{{ App\Comment::where('is_show', FALSE)->count() }}</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/admin/comments/approved') }}"><i class="fa fa-angle-right"></i> <span> Approved</span></a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#sub"><i class="fa fa-users"></i> <span>Users</span><i class="fa fa-angle-down pull-right"></i> </a>
            <div class="collapse" id="sub" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/admin/users') }}"><i class="fa fa-angle-right"></i> <span> Users List</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/admin/users/'.Auth::user()->id) }}"><i class="fa fa-angle-right"></i> <span> View Profile</span></a></li>	
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-gears"></i> <span>Settings</span><i class="fa fa-angle-down pull-right"></i> </a>
            <div class="collapse" id="submenu1" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-angle-right"></i> <span> Logo</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-angle-right"></i> <span> Password</span></a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
@endif