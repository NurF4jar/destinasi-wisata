<!DOCTYPE html>
<html lang="en">

<?php $page="home"; ?>

<?php include "_head.php";?>

<style>

  @media print
  {
    .btn, .p-2, .footer, .page-heading, .masthead
    {
      display: none !important;
    }
  }

</style>

<body>

  <?php include "_header-login.php";?>

  <main>

      <div class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/images/sabuk.jpg')">
        <div class="container">

            <div class="pos flex-column flex-md-row ">

                <div class="page-heading">
                   <h1><b>Regional I</b></h1>
                </div>

                <!-- <div class="input-group select_prov">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Pilih Provinsi</label>
                  </div>
                  <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Prov. Aceh</option>
                    <option value="">Prov. Sumatera Utara</option>
                    <option value="">Prov. Riau</option>
                    <option value="">Prov. Sumatera Barat </option>
                    <option value="">Prov. Kepulauan Riau </option>
                    <option value="">Prov. Jambi </option>
                    <option value="">Prov. Bengkulu </option>
                    <option value="">Prov. Sumatera Selatan </option>
                    <option value="">Prov. Kepulauan Bangka Belitung </option>
                    <option value="">Prov. Lampung </option>
                  </select>
                </div> -->

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
            <button type="button" class="btn btn-success" data-value="atraksi" onclick="window.print()"><i class="fa fa-print"></i>Print</button>

            <!-- <ol class="breadcrumb">
              <li><a href="/pariwisata/"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="/pariwisata/admin/input">Dashboard</a></li>
              <li class="active">Detail Atraksi</li>
            </ol> -->
          </section>


          <div class="card col-md-12 wow fadeInUp">

                <!-- Title -->
                <h1 class="card-title"><?php echo ucwords($_GET['type']); ?></h1>
                <?php echo $database_destinasi[0][$_GET['type']]; ?>

                <div class="clearfix"></div>
          </div>

      </div><!-- container -->

  </main>

  <?php include "_footer.php";?>

  <?php include "_js.php";?>

<script>

var $id_provinsi  = $('#id_provinsi').val();
var $id_destinasi = $('#id_destinasi').val();

</script>
</body>
</html>
