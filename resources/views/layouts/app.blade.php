<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dashboard') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashlitee1e3.css?ver=3.2.4') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/themee1e3.css?ver=3.2.4') }}">
    <!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <div class="nk-main ">
            @include('layouts.navigation')
            <div class="nk-wrap ">
                <div class="nk-header nk-header-fluid nk-header-fixed is-light">
                    @include('layouts.header')
                </div>
                <div class="nk-content ">
                    <div class="container-xl wide-lg">
                        <div class="nk-content">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2024 DashLite. Template by <a
                                    href="https://softnio.com/" target="_blank">Softnio</a></div>
                            <div class="nk-footer-links">
                                <ul class="nav nav-sm">
                                    <li class="nav-item dropup"><a href="#"
                                            class="dropdown-toggle dropdown-indicator has-indicator nav-link text-base"
                                            data-bs-toggle="dropdown" data-offset="0,10"><span>English</span></a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                            <ul class="language-list">
                                                <li><a href="#" class="language-item"><span
                                                            class="language-name">English</span></a></li>
                                                <li><a href="#" class="language-item"><span
                                                            class="language-name">Español</span></a></li>
                                                <li><a href="#" class="language-item"><span
                                                            class="language-name">Français</span></a></li>
                                                <li><a href="#" class="language-item"><span
                                                            class="language-name">Türkçe</span></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item"><a data-bs-toggle="modal" href="#region" class="nav-link"><em
                                                class="icon ni ni-globe"></em><span class="ms-1">Select
                                                Region</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (with Popper) -->
    <script src="{{ asset('admin/assets/js/bundlee1e3.js?ver=3.2.4') }}"></script>
    <script src="{{ asset('admin/assets/js/scriptse1e3.js?ver=3.2.4') }}"></script>
    <script src="{{ asset('admin/assets/js/demo-settingse1e3.js?ver=3.2.4') }}"></script>
    <script src="{{ asset('admin/assets/js/charts/gd-defaulte1e3.js?ver=3.2.4') }}"></script>

</body>

</html>