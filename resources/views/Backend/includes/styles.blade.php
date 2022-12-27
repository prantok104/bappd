<!-- jvectormap -->
<link href="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">
{{--Uppy video upload--}}
<link href="https://releases.transloadit.com/uppy/v2.12.1/uppy.min.css" rel="stylesheet">
<!-- Sweet Alert -->
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css" rel="stylesheet" type="text/css"> --}}
<link href="{{ asset('backend/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">
<!-- App css -->
<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/css/jquery-ui.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/lightbox/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/timepicker/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
{{--

    Table overflow solved
    this is not working

--}}
    .table-responsive{
        overflow: auto!important ;
    }
</style>
@stack('style')
