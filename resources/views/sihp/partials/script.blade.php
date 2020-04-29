<!-- jQuery 3 -->
<script src="{{asset('assets/adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/adminlte/dist/js/adminlte.min.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('assets/adminlte/bower_components/sweetalert/sweetalert.min.js')}}"></script>

<script>
  $(document).ready(function() {
    var t = $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
    })
  })
</script>
