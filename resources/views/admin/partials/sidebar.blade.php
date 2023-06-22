<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <div class="app-brand demo ">
        <a href="{{ route('admin.admin_dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/backend/img/logo.png') }}" alt="">
            </span>
            {{-- <span class="app-brand-text demo menu-text fw-bolder ms-2">RajuLaw</span> --}}
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Menus</span>
    </li>
    <ul class="menu-inner py-1">
        <li class="menu-item">
            <a href="{{ route('admin.admin_dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-grid"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.setting') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div>Home Setting</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-check-square"></i>
                <div data-i18n="Dashboards">Services</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.all_service') }}" class="menu-link">
                        <div data-i18n="Analytics">All Services</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user-account"></i>
                <div data-i18n="Dashboards">Team</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.team_create') }}" class="menu-link">
                        <div data-i18n="Analytics">Create Team member</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.all_member') }}" class="menu-link">
                        <div data-i18n="Analytics">All Member</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Dashboards">FAQ</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.all_faq') }}" class="menu-link">
                        <div data-i18n="Analytics">All FAQ</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Dashboards">Immigration News</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.all_immigration_news') }}" class="menu-link">
                        <div>All News</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.create_immigration_news') }}" class="menu-link">
                        <div>Create News</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Dashboards">Immigration Guidelines</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.all_guideline') }}" class="menu-link">
                        <div>All Guidedlines</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.create_guideline') }}" class="menu-link">
                        <div>Create Guidedlines</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-notepad"></i>
                <div data-i18n="Dashboards">Legal Fees</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.ligal_fees') }}" class="menu-link">
                        <div>All Legal Fees</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.create_legal_fees') }}" class="menu-link">
                        <div>Create Ligal Fees</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-message-square-detail"></i>
                <div data-i18n="Dashboards">About Page</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.about_us') }}" class="menu-link">
                        <div>About us Content</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.core_value') }}" class="menu-link">
                        <div>Core Valus</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item">
            <a href="{{ route('admin.all_testimonial') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-detail"></i>
                <div>Testimonial</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.appointment') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-zap"></i>
                <div>Appointment page Setting</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.tech') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxl-internet-explorer"></i>
                <div>Home Tech section</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.raju_meet') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-megaphone"></i>
                <div>Video Section</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.contact_info') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-contact"></i>
                <div>Contact Info</div>
            </a>
        </li>


        <li class="menu-item">
            <a href="{{ route('admin.contact_messages') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chat"></i>
                <div>Contact Message</div>
            </a>
        </li>

        {{-- setting --}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Admin users</span>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Dashboards">Admin Users</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.all_user') }}" class="menu-link">
                        <div>All users</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.create_user') }}" class="menu-link">
                        <div>Create user</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
