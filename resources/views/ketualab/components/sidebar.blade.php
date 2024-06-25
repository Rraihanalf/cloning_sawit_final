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
            
            <li class="{{ Request::is('ketualab') ? 'active' : '' }}">
                <a href="/" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Dasboard</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('sampel/ketualab') ? 'active' : '' }}">
                <a href="/sampel/ketualab" class="nav-link">
                    <i class="fas fa-book"></i>
                    <span>Data Sampel</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('jadwal/ketualab') ? 'active' : '' }}">
                <a href="/jadwal/ketualab" class="nav-link">
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



 