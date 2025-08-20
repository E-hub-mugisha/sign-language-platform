<div class="nk-sidebar nk-sidebar-fixed is-dark" data-content="sidebarMenu">
    <!-- Sidebar Head -->
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu">
                <em class="icon ni ni-arrow-left"></em>
            </a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu">
                <em class="icon ni ni-menu"></em>
            </a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="{{ route('dashboard') }}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{ asset('images/logo.png') }}" alt="logo">
                <img class="logo-dark logo-img" src="{{ asset('images/logo-dark.png') }}" alt="logo-dark">
            </a>
        </div>
    </div>

    <!-- Sidebar Body -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Navigation</h6>
                    </li>

                    <!-- Dashboard - All Roles -->
                    <li class="nk-menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="nk-menu-link" title="Dashboard">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>

                    @if(auth()->user()->role === 'admin')
                        <!-- Admin Menus -->
                        <li class="nk-menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                            <a href="{{ route('users.index') }}" class="nk-menu-link" title="User Management">
                                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                <span class="nk-menu-text">User Management</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {{ request()->routeIs('admin.instructors.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.instructors.index') }}" class="nk-menu-link" title="Instructor Management">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-check"></em></span>
                                <span class="nk-menu-text">Instructor Management</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {{ request()->routeIs('admin.lessons.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.lessons.index') }}" class="nk-menu-link" title="Lesson Management">
                                <span class="nk-menu-icon"><em class="icon ni ni-book"></em></span>
                                <span class="nk-menu-text">Lesson Management</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {{ request()->routeIs('admin.lessonCategories.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.lessonCategories.index') }}" class="nk-menu-link" title="Lesson Categories">
                                <span class="nk-menu-icon"><em class="icon ni ni-folder"></em></span>
                                <span class="nk-menu-text">Lesson Categories</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {{ request()->routeIs('admin.lessons.reviews') ? 'active' : '' }}">
                            <a href="{{ route('admin.lessons.reviews') }}" class="nk-menu-link" title="Lesson Reviews">
                                <span class="nk-menu-icon"><em class="icon ni ni-star"></em></span>
                                <span class="nk-menu-text">Lesson Reviews</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.testimonials.index') }}" class="nk-menu-link" title="Testimonials">
                                <span class="nk-menu-icon"><em class="icon ni ni-comment"></em></span>
                                <span class="nk-menu-text">Testimonials</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.partners.index') }}" class="nk-menu-link" title="Partners">
                                <span class="nk-menu-icon"><em class="icon ni ni-briefcase"></em></span>
                                <span class="nk-menu-text">Partners</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {{ request()->routeIs('admin.education-tips.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.education-tips.index') }}" class="nk-menu-link" title="Education Tips">
                                <span class="nk-menu-icon"><em class="icon ni ni-lightbulb"></em></span>
                                <span class="nk-menu-text">Education Tips</span>
                            </a>
                        </li>
                    @elseif(auth()->user()->role === 'teacher')
                        <!-- Instructor Menus -->
                        <li class="nk-menu-item {{ request()->routeIs('instructor.lessons.*') ? 'active' : '' }}">
                            <a href="{{ route('instructor.lessons.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-book-alt"></em></span>
                                <span class="nk-menu-text">My Lessons</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {{ request()->routeIs('instructor.tips.*') ? 'active' : '' }}">
                            <a href="{{ route('instructor.education-tips.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-lightbulb"></em></span>
                                <span class="nk-menu-text">My Tips</span>
                            </a>
                        </li>
                    @else
                        <!-- Student Menus -->
                        <li class="nk-menu-item {{ request()->routeIs('student.lessons.*') ? 'active' : '' }}">
                            <a href="{{ route('student.lessons.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-book-read"></em></span>
                                <span class="nk-menu-text">My Lessons</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {{ request()->routeIs('student.tips.*') ? 'active' : '' }}">
                            <a href="{{ route('student.education-tips.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-lightbulb"></em></span>
                                <span class="nk-menu-text">Education Tips</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
