<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img style="height: 40px; width: 40px;"  src="/profile_pictures/{{ \Illuminate\Support\Facades\Auth::user()->profile_url }}" class="img-circle" alt="" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->email }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." />
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('drinks.index') }}">
                    <i class="fa fa-glass"></i>
                    <span>Drinks</span>
{{--                    <small class="label pull-right bg-red">{{$drinks}}</small>--}}
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('orders.index') }}">
                    <i class="fa fa-list"></i>
                    <span>Orders</span>
{{--                    <small class="label pull-right bg-green">{{$orders}}</small>--}}
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>Categories</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('drinks.category', 'whiskey') }}"><i class="fa fa-circle-o"></i> Whiskey</a></li>
                    <li><a href="{{ route('drinks.category', 'beer') }}"><i class="fa fa-circle-o"></i> Beer</a></li>
                    <li><a href="{{ route('drinks.category', 'vodka') }}"><i class="fa fa-circle-o"></i> Vodka</a></li>
                    <li><a href="{{ route('drinks.category', 'gin') }}"><i class="fa fa-circle-o"></i> Gin</a></li>
                    <li><a href="{{ route('drinks.category', 'soft_drinks') }}"><i class="fa fa-circle-o"></i> Soft Drinks</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{ route('sold.index') }}">
                    <i class="fa fa-money"></i> <span>Drinks Sold</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('flippers.index') }}">
                    <i class="fa fa-image"></i> <span>Flippers</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('profile.view', \Illuminate\Support\Facades\Auth::user()->id) }}">
                    <i class="fa fa-user"></i> <span>My Profile</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('profile.edit', \Illuminate\Support\Facades\Auth::user()->id) }}">
                    <i class="fa fa-pencil"></i> <span>Edit Profile</span>
                </a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::user()->is_super_admin == 1)
                <li class="treeview">
                    <a href="{{ route('profile.index') }}">
                        <i class="fa fa-user"></i>
                        <span>Super Admin</span>
                    </a>
                </li>
            @endif
{{--            <li class="treeview">--}}
{{--                <a href="{{ route('images.index') }}">--}}
{{--                    <i class="fa fa-image"></i>--}}
{{--                    <span>Images</span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                <a href="{{route('tasks.index')}}">--}}
{{--                    <i class="fa fa-calendar"></i> <span>Tasks</span>--}}
{{--                    <small class="label pull-right bg-red">3</small>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li><a href="#"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>Success</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
