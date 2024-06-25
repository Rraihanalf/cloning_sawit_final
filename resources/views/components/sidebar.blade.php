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
            
            <li class="{{ Request::is('admin') ? 'active' : '' }}">
                <a href="/" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Dasboard</span>
                </a>
            </li>

            <li class="{{ Request::is('pegawai/admin') ? 'active' : '' }}">
                <a href="/pegawai/admin" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Data Pegawai</span>
                </a>
            </li>

            <li class="{{ Request::is('laboratorium/admin') ? 'active' : '' }}">
                <a href="/laboratorium/admin" class="nav-link">
                    <i class="fas fa-flask"></i>
                    <span>Data Laboratorium</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('lapangan/admin') ? 'active' : '' }}">
                <a href="/lapangan/admin" class="nav-link">
                    <i class="fas fa-tree"></i>
                    <span>Data Lapangan</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('sampel/admin') ? 'active' : '' }}">
                <a href="/sampel/admin" class="nav-link">
                    <i class="fas fa-book"></i>
                    <span>Data Sampel</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('user/admin') ? 'active' : '' }}">
                <a href="/user/admin" class="nav-link">
                    <i class="fas fa-user-lock"></i>
                    <span>Daftar Users</span>
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



 