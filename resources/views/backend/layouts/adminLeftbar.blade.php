<aside class="main-sidebar"> 
    <div class="sidebar"> 
        <div class="user-panel">
            <div class="image text-center">
                <img src="{{ url('dist/img/img1.jpg') }}" class="img-circle" alt="User Image"> 
            </div>
            <div class="info">
                <p>{{ Auth::user()->name ?? 'Admin' }}</p>
                <a href="#"><i class="fa fa-envelope"></i></a> 
                <a href="#"><i class="fa fa-gear"></i></a> 
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   <i class="fa fa-power-off"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
      
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"> 
                <a href="{{ route('admin.dashboard') }}"> 
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
                </a>
            </li>

            <li class="treeview {{ request()->is('employee*') ? 'active' : '' }}"> 
                <a href="#"> 
                    <i class="fa fa-users"></i> <span>Employee</span> 
                    <span class="pull-right-container"> 
                        <i class="fa fa-angle-left pull-right"></i> 
                    </span> 
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('employee') ? 'active' : '' }}">
                        <a href="{{ route('employee.index') }}"><i class="fa fa-angle-right"></i> All Employees</a>
                    </li>
                    <li class="{{ request()->is('employee/create') ? 'active' : '' }}">
                        <a href="{{ route('employee.create') }}"><i class="fa fa-angle-right"></i> Add Employee</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('department*') ? 'active' : '' }}"> 
                <a href="#"> 
                    <i class="fa fa-building"></i> <span>Department</span> 
                    <span class="pull-right-container"> 
                        <i class="fa fa-angle-left pull-right"></i> 
                    </span> 
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/department') }}"><i class="fa fa-angle-right"></i> All Departments</a></li>
                </ul>
            </li>
        </ul>
    </div>
    </aside>