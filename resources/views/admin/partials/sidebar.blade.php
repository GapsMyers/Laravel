<aside class="col-12 col-md-4 col-lg-3 col-xl-2 admin-sidebar-wrapper">
    <div class="admin-sidebar">
        <div class="sidebar-brand">
            <span class="sidebar-brand-title">InvenTrack</span>
            <span class="sidebar-brand-subtitle">Manufacturing ERP</span>
        </div>

        <nav class="sidebar-nav">
            <a class="sidebar-link {{ request()->routeIs('dashboard') ? 'is-active' : '' }}" href="{{ route('dashboard') }}">
                <span class="sidebar-icon"><i class="bi bi-grid-fill"></i></span>
                <span>Dashboard</span>
            </a>

            <a class="sidebar-link {{ request()->routeIs('request') ? 'is-active' : '' }}" href="{{ route('request') }}">
                <span class="sidebar-icon"><i class="bi bi-cart-fill"></i></span>
                <span>Purchase Request</span>
            </a>
            <a class="sidebar-link {{ request()->routeIs('approval') ? 'is-active' : '' }}" href="{{ route('approval') }}">
                <span class="sidebar-icon"><i class="bi bi-check2-circle"></i></span>
                <span>Approval</span>
            </a>
            <a class="sidebar-link" href="#">
                <span class="sidebar-icon"><i class="bi bi-file-earmark-text"></i></span>
                <span>Purchase Request</span>
            </a>
            <a class="sidebar-link" href="#">
                <span class="sidebar-icon"><i class="bi bi-box-seam"></i></span>
                <span>Goods Receipt</span>
            </a>
            <a class="sidebar-link {{ request()->routeIs('barangs.*') ? 'is-active' : '' }}"
                href="{{ route('barangs.index') }}">
                <span class="sidebar-icon"><i class="bi bi-boxes"></i></span>
                <span>Inventory</span>
            </a>
            <a class="sidebar-link" href="#">
                <span class="sidebar-icon"><i class="bi bi-clock-history"></i></span>
                <span>Audit Log</span>
            </a>
            <a class="sidebar-link {{ request()->routeIs('karyawan.*') ? 'is-active' : '' }}" href="{{ route('karyawan.index') }}">
                <span class="sidebar-icon"><i class="bi bi-people-fill"></i></span>
                <span>Users</span>
            </a>
        </nav>

        <nav class="sidebar-nav sidebar-nav-bottom">
            <a class="sidebar-link" href="#">
                <span class="sidebar-icon"><i class="bi bi-gear-fill"></i></span>
                <span>Settings</span>
            </a>
            <a class="sidebar-link" href="#">
                <span class="sidebar-icon"><i class="bi bi-question-circle-fill"></i></span>
                <span>Support</span>
            </a>
        </nav>
    </div>
</aside>
