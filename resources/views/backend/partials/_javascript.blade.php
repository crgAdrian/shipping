
    <script src="{{ asset('public/lib/adminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>


    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <script src="{{ asset('public/lib/adminLTE/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <script src="{{ asset('public/lib/adminLTE/plugins/morris/morris.min.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('public/lib/adminLTE/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- jvectormap -->
    <script src="{{ asset('public/lib/adminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('public/lib/adminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- jQuery Knob Chart -->
    <script src="{{ asset('public/lib/adminLTE/plugins/knob/jquery.knob.js') }}"></script>

    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="{{ asset('public/lib/adminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <!-- datepicker -->
    <script src="{{ asset('public/lib/adminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script>
        $(function(){
            $("#date").datepicker({ dateFormat: 'yy-mm-dd' });
        });
    </script>

    <!-- select2 -->
    <script src="{{ asset('public/lib/adminLTE/plugins/select2/select2.full.js') }}"></script>
    <script type="text/javascript">
        $("select#products").select2({
            placeholder: "Select a product",
            allowClear: true
        });

    </script>

    <!-- Slimscroll -->
    <script src="{{ asset('public/lib/adminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

    <!-- FastClick -->
    <script src="{{ asset('public/lib/adminLTE/plugins/fastclick/fastclick.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('public/lib/adminLTE/dist/js/app.min.js') }}"></script>

    {{--Ajax Token--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('javascript')
