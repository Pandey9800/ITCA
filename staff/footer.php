 <footer class="main-footer">
        <div class="pull-right hidden-xs">
         
        </div>
        <strong>Copyright &copy; <?php date('Y'); ?> Company.</strong> All rights reserved |<a href="http://focusmedia.co.in/" target="_blank">Focusmedia</a>
      </footer>
    </div><!-- ./wrapper -->


   <script src="../admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="../admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../admin/bower_components/fastclick/lib/fastclick.js"></script>

<script src="../admin/dist/js/app.min.js"></script>
<script>
 
  $(function () {
     $('.select2').select2();
    
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script></body></html>