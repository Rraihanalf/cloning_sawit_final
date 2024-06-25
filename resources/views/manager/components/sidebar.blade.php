<<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">
                <img src="{{ asset('/') }}assets/logo2.png" width="120px" alt="">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href=""><img src="{{ asset('/') }}assets/sawitlogo.png" width="50px" alt=""></a>
        </div>
        
        <ul class="sidebar-menu">
            
            <li class="menu-header">MENU</li>
            
            <li class="{{ Request::is('manager') ? 'active' : '' }}">
                <a href="/" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Dasboard</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('sampel/manager') ? 'active' : '' }}">
                <a href="/sampel/manager" class="nav-link">
                    <i class="fas fa-book"></i>
                    <span>Data Sampel</span>
                </a>
            </li>
            
            <li class="nav-item {{ Request::is('laboratorium/manager') ? 'active' : '' }}">
                <a href="/laboratorium/manager" class="nav-link">
                    <i class="fas fa-flask"></i>
                    <span>Data Laboratorium</span>
                </a>
            </li>
            
            <li class="nav-item {{ Request::is('lapangan/manager') ? 'active' : '' }}">
                <a href="/lapangan/manager" class="nav-link">
                    <i class="fas fa-tree"></i>
                    <span>Data Lapangan</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('jadwal/manager') ? 'active' : '' }}">
                <a href="/jadwal/manager" class="nav-link">
                    <i class="fas fa-calendar"></i>
                    <span>Jadwal</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="/logout" class="nav-link">
                    <i class="fas fa-sign-out"></i>
                    <span>Logout</span>
                </a>
            </li>
            
        </ul>

        
    </aside>
</div>



 