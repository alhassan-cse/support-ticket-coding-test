<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <img class="img-circle lazy" alt="{{ Auth::user()->name }}" data-src="{{ Auth::user()->avatar }}" src="{{ asset('assets/img/placeholder/avatar.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder/avatar.jpg') }};">
        </div> 
        <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#" id="tryMe"><i class="fa fa-circle text-success" ></i> Online</a>
        </div>
    </div>
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form> 
    <ul class="sidebar-menu" data-toggle="event-side-menu">
        <li class="active treeview"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
         
        <li class="treeview sub_menu_parent"> 
            <a href="#">
                <i class="fa fa-sun-o"></i>
                <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu sub_menu">
                <li><a href="{{ route('users.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li> 
                <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> Manages</a></li>
            </ul>
        </li>

        <li class="treeview sub_menu_parent"> 
            <a href="#">
                <i class="fa fa-sun-o"></i>
                <span>Tickets</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu sub_menu">
                <li><a href="{{ route('usertickets.index') }}"><i class="fa fa-circle-o"></i> Manages</a></li>
            </ul>
        </li>
 
    </ul>
</section>