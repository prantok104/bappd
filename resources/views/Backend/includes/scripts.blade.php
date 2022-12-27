<!-- jQuery  -->
<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/metismenu.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/waves.js') }}"></script>
<script src="{{ asset('backend/assets/js/feather.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/moment.js') }}"></script>
<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('backend/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('backend/assets/pages/jquery.form-upload.init.js') }}"></script>
<script src="{{ asset('backend/plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('backend/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('backend/assets/pages/jquery.forms-advanced.js') }}"></script>


<!--Wysiwig js-->
<script src="{{ asset('backend/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('backend/assets/pages/jquery.form-editor.init.js') }}"></script>

<script src="{{ asset('backend/plugins/lightbox/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('backend/assets/pages/jquery.lightbox.init.js') }}"></script>

<script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://releases.transloadit.com/uppy/v2.12.1/uppy.min.js"></script>


<!-- Sweet-Alert  -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- App js -->
<script src="{{ asset('backend/assets/js/app.js') }}"></script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
{!! Toastr::message() !!}
@stack('script')
