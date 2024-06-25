<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            
            
        
            <li><a href="#"
                    data-toggle="sidebar"
                    class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#"
                    data-toggle="search"
                    class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <!-- <div class="search-element">
            <input class="form-control"
                type="search"
                placeholder="Search"
                aria-label="Search"
                data-width="290">

            <button class="btn"
                type="submit"><i class="fas fa-search"></i>
            </button>
        </div> -->
    </form>
    <ul class="navbar-nav navbar-right">
        <li>
            <a href="#"     
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image"
                    src="{{ asset('img/avatar/avatar-1.png') }}"
                    class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->username }}</div>
                <!-- <div class="d-sm-none d-lg-inline-block">Admin</div> -->
            </a>
        </li>
    </ul>
</nav>
