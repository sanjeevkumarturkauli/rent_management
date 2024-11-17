<div>
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
                <span class="app-brand-text demo menu-text fw-bold">RMS</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item active open">
                <a href="{{ route('dashboard') }}" class="menu-link @if (request()->routeIs('admin.dashboard') ||
                        request()->routeIs('owner.dashboard') ||
                        request()->routeIs('partner.dashboard')) active @endif">
                    <i class="menu-icon tf-icons ti ti-dashboard"></i>
                    <div>Dashboard</div>
                </a>

            </li>

            {{-- If Has Admin Then Show This Route --}}
            @role('admin')
                <li class="menu-item active open">
                    <a href="{{ route('owner.index') }}" class="menu-link @if (request()->routeIs('owner.index') || request()->routeIs('owner.add')) active @endif">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div>Owners</div>
                    </a>
                </li>
                <li class="menu-item active open">
                    <a href="{{ route('partner.index') }}"
                        class="menu-link @if (request()->routeIs('partner.index')) active @endif">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div>Partners</div>
                    </a>
                </li>
            @endrole

            <!-- Layouts -->
            {{-- <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                    <div data-i18n="Layouts">Layouts</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="layouts-collapsed-menu.html" class="menu-link">
                            <div data-i18n="Collapsed menu">Collapsed menu</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layouts-content-navbar.html" class="menu-link">
                            <div data-i18n="Content navbar">Content navbar</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                            <div data-i18n="Content nav + Sidebar">Content nav + Sidebar</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../horizontal-menu-template" class="menu-link" target="_blank">
                            <div data-i18n="Horizontal">Horizontal</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layouts-without-menu.html" class="menu-link">
                            <div data-i18n="Without menu">Without menu</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layouts-without-navbar.html" class="menu-link">
                            <div data-i18n="Without navbar">Without navbar</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layouts-fluid.html" class="menu-link">
                            <div data-i18n="Fluid">Fluid</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <div data-i18n="Container">Container</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layouts-blank.html" class="menu-link">
                            <div data-i18n="Blank">Blank</div>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </aside>
</div>
