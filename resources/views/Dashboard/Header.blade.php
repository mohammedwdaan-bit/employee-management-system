<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة إدارة المهام المتقدمة</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
    @if (App::getLocale()=='ar')

    <link rel="stylesheet" href="{{ asset('build/dashboard/mm.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('build/dashboard/mm_en.css') }}">
        
    @endif
     
</head>
<body>
    <!-- تحميل أولي -->
    <div class="loader" id="loader">
        <div class="loader-logo">
            <i class="fas fa-tasks"></i>
        </div>
        <div class="loader-bar">
            <div class="loader-progress" id="loader-progress"></div>
        </div>
    </div>

    <div class="dashboard" id="dashboard">
        <!-- الشريط الجانبي -->
        <div class="sidebar">
            <div class="sidebar-header">
                <i class="fas fa-chart-line"></i>
                <h2>{{ trans('dashboard_trans.Dashboard') }}</h2>
            </div>
            <div class="menu">
                <div class="menu-item">
                    <i class="fas fa-home"></i>
                    <span>{{ trans('dashboard_trans.Home') }}</span>
                </div>
                @php
                    $Task_Management=route('dashboard.admin')
                @endphp
                <div class="menu-item {{ request()->routeIs('dashboard.admin') ? 'active' : '' }} " onclick="window.location.href='{{ $Task_Management }}'">
                    <i class="fas fa-tasks"></i>
                    <span>{{ trans('dashboard_trans.Task_Management') }}</span>
                </div>
                <!-- <a  href="{{ route('users.view') }}"> -->
                @php
                    $userUrl = route('users.view');
                @endphp

                <div class="menu-item {{ request()->routeIs('users.view') ? 'active' : '' }}" onclick="window.location.href='{{ $userUrl }}'">
                    <i class="fas fa-users"></i>
                    <span>{{ trans('dashboard_trans.Employee_Management') }}</span>
                </div>
                <!-- </a> -->
                
                <form method="POST" action="{{ route('logout.admin') }}">
                    @csrf
                    <div class="menu-item" id="signOutItem" style="cursor: pointer;" onclick="this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt sign-out"></i>
                        <div>
                           
                            <h4>{{ trans('dashboard_trans.Logout') }}</h4>
                        </div>
                    </div>
                </form>

                @php
                    $reports = route('index.report');
                @endphp

                <div class="menu-item {{ request()->routeIs('index.report') ? 'active' : '' }}" onclick="window.location.href='{{ $reports }}'">
                    <i class="fas fa-chart-bar"></i>
                    <span>{{ trans('dashboard_trans.Reports') }}</span>
                </div>

                @php
                    $profileAdmin = route('profile.edit');
                @endphp
                
                <div class="menu-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}" onclick="window.location.href='{{ $profileAdmin }}'">
                    <i class="fas fa-cog"></i>
                    <span>{{ trans('dashboard_trans.Settings') }}</span>
                </div>
                
            </div>
            <div class="sidebar-footer">
                <div class="user-avatar">A</div>
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-role">مدير المشروع</div>
                </div>
            </div>
        </div>

        <!-- المحتوى الرئيسي -->
        <div class="main-content">
            <!-- الهيدر -->
            <div class="header">
                <div class="header-title">
                    <i class="fas fa-tasks"></i>
                      {{ trans('dashboard_trans.Task_Management_Dashboard') }}
                </div>
                <div class="header-actions">
                    <div class="search-box">
                        <input type="text" placeholder="{{ trans('dashboard_trans.Search_for_task..') }}">
                        <i class="fas fa-search"></i>
                    </div>
                    <!-- <div class="notification">
                        <i class="fas fa-bell"></i>
                        <div class="notification-badge">3</div>
                    </div> -->
                </div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                {{-- شريط اختيار اللغة --}}
                <div style="text-align: center; margin: 20px;">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a 
                            rel="alternate" 
                            hreflang="{{ $localeCode }}" 
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                            style="margin: 0 10px; text-decoration: none; font-weight: bold;"
                        >
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            </div>

        @yield('mm')



<script src="{{ asset('build/dashboard/mm.js') }}"></script>


</body>
</html>