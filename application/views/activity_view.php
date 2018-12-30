
<!DOCTYPE html>
<html lang="en">

<?php $page="home"; ?>

<?php include "_head.php";?>

<!-- these css and js files are required by datatables -->
<link href="<?php echo base_url(); ?>assets/modalgrid/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/modalgrid/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/modalgrid/datatables/css/buttons.dataTables.min.css" rel="stylesheet">

<body>

  <?php include "_header-login.php";?>

  <main>

      <div class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/images/sabuk.jpg')">
        <div class="container">

            <div class="pos flex-column flex-md-row ">

                <div class="page-heading ">
                   <h1><b>Regional I</b></h1>
                </div>
            </div>

        </div>
      </div>



      <div class="container">

          <section class="content-header">
            <!-- <h1>
              Dashboard
              <small>Prov. Sumatera Utara</small>
            </h1> -->
            <button type="button" class="btn btn-secondary" onclick="history.back();" value="Back"><i class="fa fa-arrow-left"></i> Dashboard </button>
            <button type="button" class="btn btn-success" data-value="atraksi" onclick="window.print()"><i class="fa fa-print"></i> Print</button>

            <!-- <ol class="breadcrumb">
              <li><a href="/pariwisata/"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="/pariwisata/admin/input">Dashboard</a></li>
              <li class="active">Detail Atraksi</li>
            </ol> -->
          </section>


          <div class="card wow fadeInUp">

                <!-- Title -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                	<div class="x_panel">
                		<h1 style="font-size:20pt"> Activity Log </h1><br/>
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <div id="myTabContent" class="tab-content">
                                <table id="activity_data" class="table table-striped table-bordered jambo_table" cellspacing="0" width="140%">
                                    <thead>
                                        <tr>
                                            <th>Nama User</th>
                                            <th>User Level</th>
                                            <th>Activity</th>
                                            <th>Log Time</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
          </div>

      </div><!-- container -->

  </main>

  <?php include "_footer.php";?>

  <?php include "_js.php";?>

</body>
</html>

<!-- DATATABLES MODALS SCRIPT -->
		<script src="<?php echo base_url(); ?>assets/modalgrid/datatables/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modalgrid/datatables/js/dataTables.bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>assets/modalgrid/datatables/js/dataTables.buttons.min.js"></script>
<!-- DATATABLES MODALS SCRIPT -->

<script type="text/javascript">
    $(document).ready(function() {
            //datatables
        table = $('#activity_data').DataTable({

            "scrollY" 	: 450,
            "scrollX" 	: true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('activity_log/ajax_list/'); ?>",
                "type": "POST"

            },

            //Set column definition initialisation properties.
            "columnDefs": [
            {
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            },
            ],

        });

        // );

    });



</script>
