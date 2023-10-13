<!-- /.control-sidebar -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->    
</div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
</div>
<!-- ./wrapper -->

<!-- Jquery-3.6.0 -->
<script src="<?= PUBLICC;?>/js/jquery-3.6.0.min.js"></script>
<!-- jQuery -->
<!-- <script src="<?= PUBLICC;?>/AdminLTE3/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/moment/moment.min.js"></script>
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= PUBLICC;?>/AdminLTE3/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= PUBLICC;?>/AdminLTE3/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= PUBLICC;?>/AdminLTE3/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/jszip/jszip.min.js"></script>
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- script buatan -->
<script src="<?= PUBLICC;?>/js/<?php if (isset($data['script'])) echo $data['script'];?>.js"></script>

</body>
</html>
