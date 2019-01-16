<script src="{{url('assets/datatable/jquery-3.3.1.js')}}"></script>
<script src="{{url('assets/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assets/datatable/dataTables.bootstrap.min.js')}}"></script>
<script src="{{url('assets/plugins/bootstrap.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "aLengthMenu": [[5, 10, 15, 20, 25, -1], [5, 10, 15, 20, 25, "All"]],
            "pageLength": 5,
            "bFilter" : false,
        });
    } );
</script>