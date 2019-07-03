      <footer class="site-footer">
        <div class="text-center">
          2015 &copy; BPPTKG DIY
          <a href="#" class="go-top">
            <i class="icon-angle-up"></i>
          </a>
        </div>
      </footer>
      <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()  ?>themes/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url()  ?>themes/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url()  ?>themes/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url()  ?>themes/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url()  ?>themes/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url()  ?>themes/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url()  ?>themes/assets/data-tables/DT_bootstrap.js"></script>
    <script src="<?php echo base_url()  ?>themes/js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url()  ?>themes/js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="<?php echo base_url()  ?>themes/js/editable-table.js"></script>
    <script src="<?php echo base_url() . 'themes/js/bootbox.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'themes/js/bootstrap-datepicker.js' ?>"></script>

    <link rel="stylesheet" href="<?php echo base_url() . 'themes/js/jqueryui192/css/smoothness/jquery-ui-1.9.2.custom.css'; ?>" />
    <script src="<?php echo base_url() . 'themes/js/jqueryui192/js/jquery-ui-1.9.2.custom.js'; ?>"></script>

    <!-- END JAVASCRIPTS -->
    <script>
      jQuery(document).ready(function() {
        EditableTable.init();
      });

      setTimeout(function() {
        $('.notifikasi').fadeOut('slow');
      }, 3000);

      $(function() {
        $( "#tgl" ).datepicker({
        });
      });

    </script>


  </body>
  </html>