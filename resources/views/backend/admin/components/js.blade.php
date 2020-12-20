
<!-- Bootstrap -->
<script src="{{url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{url('backend/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{url('backend/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{url('backend/dist/js/demo.js')}}"></script>
<script src="{{url('backend/dist/js/pages/dashboard3.js')}}"></script>

<!-- DataTables -->
<script src="{{url('backend/plugins/datatables/jquery.dataTables.min.j')}}s"></script>
<script src="{{url('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

  <!-- Select2 -->
<script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>

<script>
  $(function () {
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>

<script>
  $(function () {
    $("#example3").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>

<script>
  $(function () {
    $("#example4").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
   })
</script>

<script>
	$(document).ready(function(){
		$("#modalSuccess").modal('show');
	});
</script>

</body>
</html>