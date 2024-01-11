      <footer class="main-footer">
        <strong>Copyright &copy; 2023 Sistem Informasi Perpustakaan SMK N 2 Depok.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.2.0
        </div>
      </footer>  
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>

    <script>
      $(document).ready(function(){

      // $(".edit").hide();
        $('#table-datatable').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : true,
          'ordering'    : false,
          'info'        : true,
          'autoWidth'   : true,
          "pageLength": 50
        });
      });

      $('#datepicker').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
      }).datepicker("setDate", new Date());

      $('.datepicker2').datepicker({
        autoclose: true,
        format: 'yyyy/mm/dd',
      });

      $(function () {
        CKEDITOR.replace('editor1')
      });

      $(document).ready(function(){
        $("#pesan_pilih_tujuan").on("change",function(){
          var pilih = $(this).val();
          var data = "tujuan="+pilih;
          if(pilih.length > 0){
            $.ajax({
              url: "pesan_ajax_pilih_tujuan.php",
              method: "POST", 
              data:data,
              success: function(result){
                $(".tampil_tujuan").html(result);
              }});
          }
        });
      });
    </script>
  </body>
</html>
