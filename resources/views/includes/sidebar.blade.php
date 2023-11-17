<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="#"><span class="brand-logo">
                    </span>
                    <h2 class="brand-text">News App</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('dashboard') }}"><i
                        data-feather="activity"></i><span class="menu-title text-truncate"
                        data-i18n="Kanban">Dashboard</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                        data-feather="file-text"></i><span class="menu-title text-truncate"
                        data-i18n="Invoice">Management</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('news') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">News</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('user') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Preview">User</span></a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
