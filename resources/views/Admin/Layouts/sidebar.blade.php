<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">

            <div class="logo-img">
            </div>
            <span class="text" style=" color: white; font-size: 25px;">Machina Makara </span>

            <button type="button" class="nav-toggle"><i data-toggle="expanded"
                    class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Navigation</div>
                    <div class="nav-item active">
                        <a href="{{url('ADashboard')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Users</span></a>
                        <div class="submenu-content">
                            <a href="{{url('AUsers')}}" class="menu-item"><i class="ik ik-list"></i><span>Show
                                    Users</span></a>
                        </div>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Cars</span></a>
                        <div class="submenu-content">
                            <a href="{{url('ACars')}}" class="menu-item"><i class="ik ik-list"></i><span>Show
                                    Cars</span></a>

                        </div>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Brands</span></a>
                        <div class="submenu-content">
                            <a href="{{url('ABrands')}}" class="menu-item"><i class="ik ik-list"></i><span>Show
                                    Brands</span></a>
                        </div>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Offices</span></a>
                        <div class="submenu-content">
                            <a href="{{url('AOffices')}}" class="menu-item"><i class="ik ik-list"></i><span>Show
                                    Offices</span></a>
                        </div>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Rentals</span></a>
                        <div class="submenu-content">
                            <a href="{{url('ARentals')}}" class="menu-item"><i class="ik ik-list"></i><span>Show
                                    Rentals</span></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>