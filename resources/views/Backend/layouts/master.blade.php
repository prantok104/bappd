{{-- header area start --}}
@include('backend.includes.header')
{{-- header area end --}}

{{-- Sidebar area start --}}
@include('backend.includes.sidebar_menu')
{{-- Sidebar area end --}}

<div class="page-wrapper">

    {{--Top bar area start--}}
    @include('backend.includes.topbar')
    {{--Top bar area end--}}

    <!-- Page Content-->
    <div class="page-content">

        {{-- Main content start --}}
        <div class="container-fluid">
            @yield('content')
        </div>
        {{-- Main content end --}}


        <footer class="footer text-center text-sm-left">
            &copy; 2022 DhakaLive OTT <span class="d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by DhakaLive OTT</span>
        </footer><!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->

{{-- Footer area start --}}
@include('backend.includes.footer')
{{-- Footer area end --}}
