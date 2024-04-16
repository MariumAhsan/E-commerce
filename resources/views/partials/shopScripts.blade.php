<!-- Vendor JS-->
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('assets')}}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{asset('assets')}}/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets')}}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="{{asset('assets')}}/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/slick.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/waypoints.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/wow.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/perfect-scrollbar.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/magnific-popup.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/select2.min.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/counterup.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/jquery.countdown.min.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/images-loaded.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/isotope.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/scrollup.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/jquery.vticker-min.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="{{asset('assets')}}/assets/js/plugins/jquery.elevatezoom.js"></script>
<!-- Template  JS -->
<script src="{{asset('assets')}}/assets/js/main.js?v=5.5"></script>
<script src="{{asset('assets')}}/assets/js/shop.js?v=5.5"></script>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Toastr -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(document).ready(function(){
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });
    @if(Session::has('message'))
        var type ="{{ Session::get('alert-type', 'info') }}";

        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");    
            break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
            break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
            break;
            case 'danger':
                toastr.error("{{ Session::get('message') }}");
            break;
        }
    @endif
</script>