<!DOCTYPE html>
<html lang="es" class="light">
    @include('panel.admin.components.head')
    <body class="app">
        @include('panel.admin.components.mobile-menu')
        <div class="flex">
            @include('panel.admin.components.side-menu')
            <!-- BEGIN: Content -->
            <div class="content">
            @yield('content')
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: Dark Mode Switcher-->
        {{-- <div data-url="side-menu-dark-dashboard.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
            <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
            <div class="dark-mode-switcher__toggle border"></div>
        </div> --}}
        <!-- END: Dark Mode Switcher-->
        @include('panel.admin.components.assets')
        @yield('extra-scripts')
    </body>
</html>
