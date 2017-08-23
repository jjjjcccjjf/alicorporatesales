
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              <?php echo date("Y"); ?> &copy; ALI Corporate Sales Inquiry Management by Optimind Solutions.
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('frontend/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('frontend/js/bootstrap.min.js'); ?>"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url('frontend/js/jquery.dcjqaccordion.2.7.js'); ?>"></script>
    <script src="<?php echo base_url('frontend/js/jquery.scrollTo.min.js'); ?>"></script>
    <script src="<?php echo base_url('frontend/js/jquery.nicescroll.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('frontend/js/jquery.sparkline.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('frontend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js'); ?>"></script>
    <script src="<?php echo base_url('frontend/js/owl.carousel.js'); ?>" ></script>
    <script src="<?php echo base_url('frontend/js/jquery.customSelect.min.js'); ?>" ></script>
    <script src="<?php echo base_url('frontend/js/respond.min.js'); ?>" ></script>

    <script type="text/javascript" src="<?php echo base_url('frontend/assets/fuelux/js/spinner.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend/assets/bootstrap-fileupload/bootstrap-fileupload.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend/assets/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend/assets/bootstrap-daterangepicker/moment.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend/assets/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend/assets/bootstrap-timepicker/js/bootstrap-timepicker.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend/assets/jquery-multi-select/js/jquery.multi-select.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend/assets/jquery-multi-select/js/jquery.quicksearch.js'); ?>"></script>
    <script src="<?php echo base_url('frontend/js/advanced-form-components.js'); ?>"></script>


    <?php if(isset($dynamic_table) && $dynamic_table == true): ?>
    <script type="text/javascript" language="javascript" src="<?php echo base_url('frontend/assets/advanced-datatable/media/js/jquery.dataTables.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend/assets/data-tables/DT_bootstrap.js'); ?>"></script>
    <!--dynamic table initialization -->
    <script src="<?php echo base_url('frontend/js/dynamic_table_init.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend/assets/bootstrap-fileupload/bootstrap-fileupload.js'); ?>"></script>
    <?php endif; ?>


    <!--right slidebar-->
    <script src="<?php echo base_url('frontend/js/slidebars.min.js'); ?>"></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url('frontend/js/common-scripts.js'); ?>"></script>

    <!--script for this page-->
    <script src="<?php echo base_url('frontend/js/sparkline-chart.js'); ?>"></script>
    <script src="<?php echo base_url('frontend/js/easy-pie-chart.js'); ?>"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      $(window).on("resize",function(){
          var owl = $("#owl-demo").data("owlCarousel");
          owl.reinit();
      });

  </script>

  </body>
</html>
