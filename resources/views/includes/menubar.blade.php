<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/images/male6.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ Auth::user()->name }} </p>
                <a><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">REPORTS</li>

            <li class=""><a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class="header">MANAGE</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Employees</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/employees"><i class="fa fa-circle-o"></i> Employees List</a></li>
                </ul>
            </li>
            <li><a href="/rooms"><i class="fa fa-clock-o"></i> <span>Rooms</span></a></li>
            <li><a href="/system-calendar"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
            <li><a href="/search-room"><i class="fa fa-calendar"></i> <span>Booking</span></a></li>
            <li><a href="/payments"><i class="fa fa-money""></i> <span>Payments</span></a></li>




            {{-- <li class="header">TABLES</li> --}}
            <li><a href="/reservations"><i class="fa fa-book"></i> <span>Reservations</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
