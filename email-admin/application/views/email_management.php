<!-- main content start-->
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
          <header class="panel-heading">
            Email Inquiry
          </header>
          <div class="panel-body">
            <div class="table-responsive">
              <?php if(null !== $this->session->flashdata('alert_msg')): ?>
                <br>
                <div class="form-group">
                  <center>
                    <span style="font-size: 14px; color: <?php echo $this->session->flashdata('alert_color'); ?>">
                      <?php echo $this->session->flashdata('alert_msg'); ?>
                    </span>
                  </center>
                </div>
                <br>
              <?php endif; ?>
              <div class="row" style="width:100%">
                <form name="filters" id="filters" method="get">
                  <div class="col-lg-4">
                    <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy">
                      <input type="text" class="form-control dpd1" name="from" placeholder="Start Inquiry Date" <?php echo isset($_GET['from']) && $_GET['from'] != "" ? 'value="'.date("m/d/Y", strtotime($_GET['from'])).'"' : "";  ?>>
                      <span class="input-group-addon">To</span>
                      <input type="text" class="form-control dpd2" name="to" placeholder="End Inquiry Date" <?php echo isset($_GET['to']) && $_GET['to'] != "" ? 'value="'.date("m/d/Y", strtotime($_GET['to'])).'"' : "";  ?>>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <input type="submit" class="btn btn-primary" value="Filter">
                    <a href="<?php echo base_url($clear_url); ?>" class="btn btn-warning">Clear</a>
                    <a href="<?php echo $csv_export_link; ?>" class="btn btn-info">Export</a>
                  </div>
                </form>

              </div>
              <br>
              <div class="alert alert-info fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="fa fa-times"></i>
                </button>
                <strong>Heads up!</strong><br>All <strong>Dates</strong> are in format <strong>(MM/DD/YYYY)</strong>
              </div>
              <?php include("email_tables/".$table_name); ?>
              <div class="text-center">
                <ul class="pagination">
                  <?php echo $pagination; ?>
                </ul>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</section>
<!--main content end -->
