</div>
<footer>
    <div class="pull-right">
        Designed & Developed by <a href="#" target="_blank">Anisha Rauniyar</a>
    </div>
    <div class="clearfix"></div>
</footer>

</div>
</div>


<script src="{{asset('back/js/jquery.min.js')}}"></script>

<script src="{{asset('back/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('back/js/fastclick.js')}}"></script>

<script src="{{asset('back/js/nprogress.js')}}"></script>

<script src="{{asset('back/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{ asset('back/js/Chart.min.js')}}"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="{{asset('back/js/tail.select-full.js')}}"></script>
<script src="{{asset('back/js/gauge.min.js')}}"></script>

<script src="{{asset('back/js/bootstrap-progressbar.min.js')}}"></script>

<script src="{{asset('back/js/icheck.min.js')}}"></script>

<script src="{{asset('back/js/skycons.js')}}"></script>

<script src="{{asset('back/js/jquery.flot.js')}}"></script>
<script src="{{asset('back/js/jquery.flot.pie.js')}}"></script>
<script src="{{asset('back/js/jquery.flot.time.js')}}"></script>
<script src="{{asset('back/js/jquery.flot.stack.js')}}"></script>
<script src="{{asset('back/js/jquery.flot.resize.js')}}"></script>

<script src="{{asset('back/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('back/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('back/js/curvedLines.js')}}"></script>

<script src="{{asset('back/js/date.js')}}"></script>

<script src="{{asset('back/js/jquery.vmap.js')}}"></script>
<script src="{{asset('back/js/jquery.vmap.world.js')}}"></script>
<script src="{{asset('back/js/jquery.vmap.sampledata.js')}}"></script>

<script src="{{asset('back/js/moment.min.js')}}"></script>
<script src="{{asset('back/js/daterangepicker.js')}}"></script>

<script src="{{asset('back/js/custom.min.js')}}"></script>
<script type="text/javascript">
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<script type="text/javascript">
    tail.select(".select", {
        search: true,
        descriptions: true
    });
</script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>


</body>


</html>