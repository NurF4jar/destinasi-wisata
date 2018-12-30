<!DOCTYPE html>
<style>

#nav li.active a {
	font-weight: bold;
  color:#FFC801;
}

@media print
{
	.btn, .p-2, .footer, .page-heading, .nav, .masthead, .logo
	{
		display: none !important;
	}
}

</style>
<html lang="en">

<?php $page="home"; ?>

<?php include "_head.php";?>

<body>

  <?php include "_header-login.php";?>

<?php
$get_destinasi 	= $this->db->get_where('destinasi', array('id_provinsi' => $id_provinsi));
$get_provinsi 	= $this->db->get_where('provinsi', array('id' => $id_provinsi));

$user_login = $this->session->userdata('users_login');
$name       = $user_login['auth_menu'];
$username   = ucwords($user_login['username']);
$user_level = $user_login['user_level'];

?>

  <main>

      <div class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/images/sabuk.jpg')">
        <input type="hidden" id="id_provinsi" value="<?php echo $id_provinsi; ?>" />
        <input type="hidden" id="id_destinasi" value="<?php echo isset($_GET['id_destinasi'])?$_GET['id_destinasi']:''; ?>"/>
        <div class="container">

            <div class="pos flex-column flex-md-row ">

                <ul class="nav nav-tabs wow fadeInRight" style="color:#DCDCDC;" id="nav">
                   <li><h1><b>Regional I / </b></h1></li>
									 <?php
									 foreach ($get_destinasi->result() as $destinasi):
										 if ($destinasi->id == 1) {
											 echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" style="color:#F8F8FF;" value="'.$destinasi->id.'"><h1><b>'.$destinasi->nama.'</b></h1></a></li>';
										 } elseif ($destinasi->id == 6) {
											 echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" style="color:#F8F8FF;" value="'.$destinasi->id.'"><h1><b>'.$destinasi->nama.'</b></h1></a></li>';
 										 } elseif ($destinasi->id == 11) {
											 echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" style="color:#F8F8FF;" value="'.$destinasi->id.'"><h1><b>'.$destinasi->nama.'</b></h1></a></li>';
 										 } elseif ($destinasi->id == 16) {
											 echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" style="color:#F8F8FF;" value="'.$destinasi->id.'"><h1><b>'.$destinasi->nama.'</b></h1></a></li>';
 										 } elseif ($destinasi->id == 21) {
											 echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" style="color:#F8F8FF;" value="'.$destinasi->id.'"><h1><b>'.$destinasi->nama.'</b></h1></a></li>';
 										 } elseif ($destinasi->id == 26) {
											 echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" style="color:#F8F8FF;" value="'.$destinasi->id.'"><h1><b>'.$destinasi->nama.'</b></h1></a></li>';
 										 } elseif ($destinasi->id == 31) {
											 echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" style="color:#F8F8FF;" value="'.$destinasi->id.'"><h1><b>'.$destinasi->nama.'</b></h1></a></li>';
 										 } elseif ($destinasi->id == 36) {
											 echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" style="color:#F8F8FF;" value="'.$destinasi->id.'"><h1><b>'.$destinasi->nama.'</b></h1></a></li>';
 										 } elseif ($destinasi->id == 41) {
											 echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" style="color:#F8F8FF;" value="'.$destinasi->id.'"><h1><b>'.$destinasi->nama.'</b></h1></a></li>';
 										 } elseif ($destinasi->id == 46) {
											 echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" style="color:#F8F8FF;" value="'.$destinasi->id.'"><h1><b>'.$destinasi->nama.'</b></h1></a></li>';
 										 }
									 endforeach;
									 ?>
                </ul>

                <!-- <div class="input-group select_prov">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Pilih Provinsi</label>
                  <select class="custom-select" id="inputGroupSelect01">
                    <option value="11">Prov. Aceh</option>
                    <option value="12">Prov. Sumatera Utara</option>
                    <option value="13">Prov. Sumatera Barat </option>
                    <option value="14">Prov. Riau</option>
                    <option value="15">Prov. Jambi </option>
                    <option value="16">Prov. Sumatera Selatan </option>
                    <option value="17">Prov. Bengkulu </option>
                    <option value="18">Prov. Lampung </option>
                    <option value="19">Prov. Kepulauan Bangka Belitung </option>
                    <option value="21">Prov. Kepulauan Riau </option>
                  </select>
                  </div>
                </div> -->

            </div>

        </div>
      </div>



      <div class="container">

          <!-- box destinasi -->
          <div class="card destinasi wow fadeInUp">
            <div class="card-body">
                  <ul class="nav nav-tabs" id="nav">
                    <b>Top 5 Favorite Destination :</b>
                  <?php
                                      foreach ($get_destinasi->result() as $destinasi):
																				if ($destinasi->id != 1 && $destinasi->id_provinsi == 11) {
																					echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" value="'.$destinasi->id.'">'.$destinasi->nama.'</a></li>';
																				} elseif ($destinasi->id != 6 && $destinasi->id_provinsi == 12) {
																					echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" value="'.$destinasi->id.'">'.$destinasi->nama.'</a></li>';
																				} elseif ($destinasi->id != 11 && $destinasi->id_provinsi == 13) {
																					echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" value="'.$destinasi->id.'">'.$destinasi->nama.'</a></li>';
																				} elseif ($destinasi->id != 16 && $destinasi->id_provinsi == 14) {
																					echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" value="'.$destinasi->id.'">'.$destinasi->nama.'</a></li>';
																				} elseif ($destinasi->id != 21 && $destinasi->id_provinsi == 15) {
																					echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" value="'.$destinasi->id.'">'.$destinasi->nama.'</a></li>';
																				} elseif ($destinasi->id != 26 && $destinasi->id_provinsi == 16) {
																					echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" value="'.$destinasi->id.'">'.$destinasi->nama.'</a></li>';
																				} elseif ($destinasi->id != 31 && $destinasi->id_provinsi == 17) {
																					echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" value="'.$destinasi->id.'">'.$destinasi->nama.'</a></li>';
																				} elseif ($destinasi->id != 36 && $destinasi->id_provinsi == 18) {
																					echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" value="'.$destinasi->id.'">'.$destinasi->nama.'</a></li>';
																				} elseif ($destinasi->id != 41 && $destinasi->id_provinsi == 19) {
																					echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" value="'.$destinasi->id.'">'.$destinasi->nama.'</a></li>';
																				} elseif ($destinasi->id != 46 && $destinasi->id_provinsi == 21) {
																					echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" value="'.$destinasi->id.'">'.$destinasi->nama.'</a></li>';
																				}
                                      endforeach;
                                  ?>
                </ul>
            </div>
          </div>


          <section class="content-header">
						<ul class="nav col-md-12" style="font:bold;">
						<li><b> Dashboard /</b></li>
							<?php
							foreach ($get_destinasi->result() as $destinasi):
									if ($destinasi->id == $id_destinasi) {
									echo '<li><a href="'.current_url().'?id_provinsi='.$_GET['id_provinsi'].'&id_destinasi='.$destinasi->id.'" style="color:#000000;" value="'.$destinasi->id.'"><b> '.$destinasi->nama.'</b></a></li>';
								}
							endforeach;
							 ?>
						 </ul>

            <ol class="breadcrumb">
							<button type="button" class="btn btn-success" data-value="atraksi" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
            </ol>
          </section>


          <section class="category">

            <div class="row">
                <!-- <div class="col-md-4 mb-20">
                  <div class="card box-shadow wow fadeInLeft">
                    <h5 class="card-title">Foto Gallery</h5>
                    <img class="pict" src="images/foto-1.jpg">

                    <div class="card-body">
                      <p class="card-text">
                         <?=$database_image[0]['image1']
                         ?>
                      </p>
                    </div>
                    <div class="card-footer text-muted">
                         <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary"  data-toggle="modal" data-target="#modalform_img" data-whatever="Foto Gallery">Input Foto</button>
                          </div>
                        </div>
                    </div>

                  </div>
                </div> -->

                <div class="col-md-4 mb-20">
                  <div class="card box-shadow wow fadeInLeft">
                    <h5 class="card-title">Foto Gallery</h5>
                    <!-- <img class="pict" src="images/foto-1.jpg"> -->


                    <div class="">
                    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
                    <div id="slidedetail" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner" role="listbox">

                        <div class="carousel-item active">
                          <a href="<?php echo base_url().'/assets/images/'.$database_image[0]['image1']; ?>" class="gallery-popup" title="<?=$database_image[0]['caption1']?>">
                          <img class="d-block img-fluid" src="<?php echo base_url().'/assets/images/'.$database_image[0]['image1']; ?>" alt=" ">
                            <div class="carousel-caption">
                                <?php echo $database_image[0]['caption1'];?>
                              </p>
                            </div>
                          </a>
                        </div>

                        <div class="carousel-item">
                          <a href="<?php echo base_url().'assets/images/'.$database_image[0]['image2']; ?>" class="gallery-popup" title="<?=$database_image[0]['caption2']?>">
                          <img class="d-block img-fluid" src="<?php echo base_url().'assets/images/'.$database_image[0]['image2']; ?>" alt=" ">
                            <div class="carousel-caption">
                                <?=$database_image[0]['caption2']?>
                              </p>
                            </div>
                            </a>
                        </div>

                        <div class="carousel-item">
                          <a href="<?php echo base_url().'assets/images/'.$database_image[0]['image3']; ?>" class="gallery-popup" title="<?=$database_image[0]['caption3']?>">
                          <img class="d-block img-fluid" src="<?php echo base_url().'assets/images/'.$database_image[0]['image3']; ?>" alt=" ">
                            <div class="carousel-caption">
                                <?=$database_image[0]['caption3']?>
                            </div>
                          </a>
                        </div>

                        <div class="carousel-item">
                          <a href="<?php echo base_url().'assets/images/'.$database_image[0]['image4']; ?>" class="gallery-popup" title="<?=$database_image[0]['caption4']?>">
                          <img class="d-block img-fluid" src="<?php echo base_url().'assets/images/'.$database_image[0]['image4']; ?>" alt=" ">
                            <div class="carousel-caption">
                              <?=$database_image[0]['caption4']?>
                            </div>
                          </a>
                        </div>

                        <div class="carousel-item">
                          <a href="<?php echo base_url().'assets/images/'.$database_image[0]['image5']; ?>" class="gallery-popup" title="<?=$database_image[0]['caption5']?>">
                          <img class="d-block img-fluid" src="<?php echo base_url().'assets/images/'.$database_image[0]['image5']; ?>" alt=" ">
                            <div class="carousel-caption">
                              <?=$database_image[0]['caption5']?>
                            </div>
                          </a>
                        </div>

                        <div class="carousel-item">
                          <a href="<?php echo base_url().'assets/images/'.$database_image[0]['image6']; ?>" class="gallery-popup" title="<?=$database_image[0]['caption6']?>">
                          <img class="d-block img-fluid" src="<?php echo base_url().'assets/images/'.$database_image[0]['image6']; ?>" alt=" ">
                            <div class="carousel-caption">
                              <?=$database_image[0]['caption6']?>
                            </div>
                          </a>
                        </div>
                      </div>

                      <a class="carousel-control-prev" href="#slidedetail" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#slidedetail" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

                </div>

                   <!--  <div class="card-body">  </div> -->
                    <div class="card-footer text-muted">
                         <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <?php
                            if ($name == 'admin' || $name == 'editor' ) {
                              echo '<button type="button" class="btn btn-sm btn-outline-secondary"  data-toggle="modal" data-target="#modalform_img" data-whatever="Foto Gallery">Edit</button>';
                            }
                             ?>

                          </div>
                        </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-4 mb-20">
                  <div class="card box-shadow wow fadeInUp">
                    <h5 class="card-title">Atraksi</h5>
                    <div class="card-body" style="overflow:hidden; max-height:375px">
                      <p class="card-text">
                         <?=$database_destinasi[0]['atraksi'];?>
                      </p>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
														<button type="button" class="btn btn-sm btn-outline-secondary view" data-value="atraksi">View</button>
                            <?php
                            if ($name == 'admin' || $name == 'editor' ) {
                              $atraksi = $database_destinasi[0]['atraksi'];
                              echo "<button type='button' class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#modalform_detail' data-field='atraksi' data-value='$atraksi' data-whatever='Atraksi'>Input Data</button>";
                          }
                             ?>

                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-20">
                  <div class="card box-shadow wow fadeInRight">
                    <h5 class="card-title">Amenitas</h5>
                    <div class="card-body" style="overflow:hidden; max-height:375px">
                      <p class="card-text">
                         <?=$database_destinasi[0]['amenitas'];?>
                      </p>

                    </div>
                    <div class="card-footer text-muted">
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary view" data-value="amenitas">View</button>
                            <?php
                            if ($name == 'admin' || $name == 'editor' ) {
                              $amenitas = $database_destinasi[0]['amenitas'];
                              echo "<button type='button' class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#modalform_detail' data-field='amenitas' data-value='$amenitas' data-whatever='Amenitas'>Input Data</button>";
                            }
                             ?>

                            </div>

                          </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 mb-20">
                  <div class="card box-shadow wow fadeInLeft">
                    <h5 class="card-title">Aksesbilitas</h5>
                    <div class="card-body" style="overflow:hidden; max-height:375px">
                      <p class="card-text">
                         <?=$database_destinasi[0]['aksesbilitas'];?>
                      </p>
                    </div>

                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary view" data-value="aksesbilitas">View</button>
                            <?php
                            if ($name == 'admin' || $name == 'editor') {
                              $aksesbilitas = $database_destinasi[0]['aksesbilitas'];
                              echo "<button type='button' class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#modalform_detail' data-field='aksesbilitas' data-value='$aksesbilitas' data-whatever='Aksesbilitas'>Input Data</button>";
                            }
                             ?>

                          </div>

                        </div>
                    </div>

                  </div>
                </div>
                <div class="col-md-4 mb-20">
                  <div class="card box-shadow wow fadeInUp">
                    <h5 class="card-title">Data Wisatawan</h5>
                    <div class="card-body" style="overflow:hidden; max-height:375px">
                      <p class="card-text">
                         <?=$database_destinasi[0]['wisatawan'];?>
                      </p>

                    </div>

                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary view" data-value="wisatawan">View</button>
                            <?php
                            if ($name == 'admin' || $name == 'editor') {
                              $wisatawan = $database_destinasi[0]['wisatawan'];
                              echo "<button type='button' class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#modalform_detail' data-field='wisatawan' data-value='$wisatawan' data-whatever='Wisatawan'>Input Data</button>";
                            }
                             ?>

                          </div>

                        </div>
                    </div>

                  </div>
                </div>
                <div class="col-md-4 mb-20">
                  <div class="card box-shadow wow fadeInRight">
                    <h5 class="card-title">Kontribusi</h5>
                    <div class="card-body" style="overflow:hidden; max-height:375px">
                      <p class="card-text">
                         <?=$database_destinasi[0]['kontribusi'];?>
                      </p>

                    </div>

                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary view" data-value="kontribusi">View</button>
                            <?php
                            if ($name == 'admin' || $name == 'editor') {
                              $kontribusi = $database_destinasi[0]['kontribusi'];
                              echo "<button type='button' class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#modalform_detail' data-field='kontribusi' data-value='$kontribusi' data-whatever='Kontribusi'>Input Data</button>";
                            }
                             ?>

                          </div>

                        </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card box-shadow wow fadeInLeft">
                    <h5 class="card-title">Wisata Perdesaan dan Perkotaan</h5>
                    <div class="card-body" style="overflow:hidden; max-height:375px">
                      <p class="card-text">
                         <?=$database_destinasi[0]['pengembangan_desa'];?>
                      </p>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary view" data-value="pengembangan_desa">View</button>
                            <?php
                            if ($name == 'admin' || $name == 'editor') {
                              $pengembangan_desa = $database_destinasi[0]['pengembangan_desa'];
                              echo "<button type='button' class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#modalform_detail' data-field='pengembangan_desa' data-value='$pengembangan_desa' data-whatever='Pengembangan Desa'>Input Data</button>";
                            }
                             ?>

                          </div>

                        </div>
                    </div>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card box-shadow wow fadeInUp">
                    <h5 class="card-title">Dokumen Perencanaan</h5>
                    <div class="card-body" style="overflow:hidden; max-height:375px">
                      <p class="card-text">
                         <?=$database_destinasi[0]['dokumen_rencana'];?>
                      </p>
                    </div>

                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary view" data-value="dokumen_rencana">View</button>
                            <?php
                            if ($name == 'admin' || $name == 'editor') {
                              $dokumen_rencana = $database_destinasi[0]['dokumen_rencana'];
                              echo "<button type='button' class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#modalform_detail' data-field='dokumen_rencana' data-value='$dokumen_rencana' data-whatever='Dokumen Rencana'>Input Data</button>";
                            }
                             ?>

                          </div>

                        </div>
                    </div>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card box-shadow wow fadeInRight">
                    <h5 class="card-title">Dana Alokasi Khusus (DAK)</h5>
                    <div class="card-body" style="overflow:hidden; max-height:375px">
                      <p class="card-text">
                         <?=$database_destinasi[0]['dana_lokasi_khusus'];?>
                      </p>
                    </div>

                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary view" data-value="dana_lokasi_khusus">View</button>
                            <?php
                            if ($name == 'admin' || $name == 'editor') {
                              $dana_lokasi_khusus = $database_destinasi[0]['dana_lokasi_khusus'];
                              echo "<button type='button' class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#modalform_detail' data-field='dana_lokasi_khusus' data-value='$dana_lokasi_khusus' data-whatever='Dana Lokasi Khusus'>Input Data</button>";
                            }
                             ?>

                          </div>

                        </div>
                    </div>

                  </div>
                </div>
            </div><!-- row -->

          </section> <!-- listcard -->


          <!-- s:modal edit categori -->

          <!-- Modal -->
          <div class="modal fade" id="modalform_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="#" id="formDetail" name="formDetail"  enctype="multipart/form-data" data-method="detail">
                  <div class="modal-body">
                      <label for="message-text" class="col-form-label">Silahkan Isi:</label>
                          <textarea id="editor1" class="form-control" name="atraksi" rows="10" cols="80">

                        </textarea>

                    </div>
                <div class="modal-footer">
                  <button type="submit"id="btnSave" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
              </form>
              </div>
            </div>
          </div>


           <!-- Modal upload foto -->
          <div class="modal fade" id="modalform_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Add Foto Gallery </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="#" id="formImages" name="formImages"  enctype="multipart/form-data" data-method="image">
                    <div class="row">
                          <div class="col-md-4">

                              <div id="image-preview">
                                <label for="image-upload" id="image-label">Upload Foto ke-1</label>
                                <input type="file" name="image1" id="image-upload" class="file" value="" accept="image/*" />
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Keterangan Foto 1</label>
                                <textarea  class="form-control" name="caption1" id="caption1" row="10"> </textarea>
                              </div>

                          </div>
                           <div class="col-md-4">

                              <div id="image-preview1">
                                <label for="image-upload1" id="image-label1">Upload Foto ke-2</label>
                                <input type="file" name="image2" id="image-upload1" class="file" value="" accept="image/*"/>
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Keterangan Foto 2</label>
                                <textarea  class="form-control" name="caption2" id="caption2" row="10"> </textarea>
                              </div>

                          </div>
                          <div class="col-md-4">

                              <div id="image-preview2">
                                <label for="image-upload" id="image-label2">Upload Foto ke-3</label>
                                <input type="file" name="image3" id="image-upload2" class="file" value="" accept="image/*"/>
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Keterangan Foto 3</label>
                                <textarea  class="form-control" name="caption3" id="caption3" row="10"> </textarea>
                              </div>

                          </div>
                          <div class="col-md-4">
                              <div id="image-preview3">
                                <label for="image-upload" id="image-label3">Upload Foto ke-4</label>
                                <input type="file" name="image4" id="image-upload3" class="file" value="" accept="image/*"/>
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Keterangan Foto 4</label>
                                <textarea  class="form-control" name="caption4" id="caption4" row="10"> </textarea>
                              </div>
                          </div>
                           <div class="col-md-4">
                              <div id="image-preview4">
                                <label for="image-upload" id="image-label4">Upload Foto ke-5</label>
                                <input type="file" name="image5" id="image-upload4" class="file" value="" accept="image/*"/>
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Keterangan Foto 5</label>
                                <textarea  class="form-control" name="caption5" id="caption5" row="10"> </textarea>
                              </div>
                          </div>

                          <div class="col-md-4">
                             <div id="image-preview5">
                               <label for="image-upload" id="image-label5">Upload Foto ke-6</label>
                               <input type="file" name="image6" id="image-upload5" class="file" value="" accept="image/*"/>
                             </div>
                             <div class="form-group">
                               <label for="message-text" class="col-form-label">Keterangan Foto 6</label>
                               <textarea  class="form-control" name="caption6" id="caption6" row="10"> </textarea>
                             </div>
                          </div>

                          <div class="col-md-4">

                            <b>Note:</b><br>
                            File gambar maksimal 20 mb <br>
                            Maksimal 5 foto <br>

                          </div>
                    </div><!-- row -->
                </div>
                <div class="modal-footer">
                  <button type="submit" id="btnSave" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
              </form>
              </div>
            </div>
          </div>


          <!-- Modal destinasi-->
          <div class="modal fade" id="modalform_destinasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Favorite Destination</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" id="formDestinasi" name="formDestinasi"  enctype="multipart/form-data" data-method="destinasi">
                      <label for="message-text" class="col-form-label">Silahkan Isi:</label>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Favorite Destinasi">
                </div>
                <div class="modal-footer">
                  <button type="submit" id="btnSave" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
              </form>
              </div>
            </div>
          </div>


          <!-- e:modal -->


      </div><!-- container -->

  </main>

  <?php include "_footer.php";?>

  <?php include "_js.php";?>

</body>
</html>

<!-- form validation -->
<script src="<?php echo base_url('assets/lib/validator/validator.js'); ?>"></script>

<script type="text/javascript">

$(".view").click(function(){
  // alert("test");
  window.location= "../home/detail?id_provinsi="+$id_provinsi+"&id_destinasi="+$id_destinasi+"&type="+$(this).attr('data-value');
});

// initialize the validator function
validator.message['date'] = 'not a real date';

// validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
$('form')
    .on('blur', 'input[required], input.optional, select.required', validator.checkField)
    .on('change', 'select.required', validator.checkField)
    .on('keypress', 'input[required][pattern]', validator.keypress);

$('.multi.required')
    .on('keyup blur', 'input', function () {
        validator.checkField.apply($(this).siblings().last()[0]);
    });

var $id_provinsi  = $('#id_provinsi').val();
var $id_destinasi = $('#id_destinasi').val();

$('form').submit(function (e) {
//   alert("sadad");

    e.preventDefault();
    var submit = true;
    // evaluate the form using generic validaing
    // if (!validator.checkAll($(this))) {
    //     submit = false;
    // }

    var ajax_url    = '';

           // if($('#formImages').attr('data-method') == 'image') {
           if(this.attributes["data-method"].nodeValue == 'destinasi') {
             ajax_url    = "<?php echo base_url('proses/add_destinasi/'); ?>"+$id_provinsi+'/'+$id_destinasi;
           } else if (this.attributes["data-method"].nodeValue == 'image'){
             ajax_url    = "<?php echo base_url('proses/add_image/'); ?>"+$id_provinsi+'/'+$id_destinasi;
           } else {
             ajax_url    = "<?php echo base_url('proses/add_destinasi/'); ?>"+$id_provinsi+'/'+$id_destinasi;
           }
           // console.log(ajax_url);
           // console.log(this.attributes["data-method"].nodeValue);
           // console.log($(this.id).serialize());

    if (submit) {
      var data = new FormData(this);
      var name_editor1 = $('#editor1').attr('name');
      data.append(name_editor1, CKEDITOR.instances['editor1'].getData());

        $.ajax({
            url : ajax_url,
            type: "POST",
            data: data,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function(feedback)
            {
                if (feedback.status == "data_duplicate") {
                    swal({
                        title: "Failed Updated",
                        text: "Data Update Duplicated \nData sudah pernah di Update. Silahkan cek di Tab Tabel",
                        type: "error"
                    });
                } else if (feedback.status == "success") {
                    // console.log(feedback
                    location.reload();
                }

                $('#btnSave').text('saved'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Ada kesalahan dalam proses adding / update Asset');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable

            }
        });
    }
    return false;
});

$('#modalform_detail').on('show.bs.modal', function (event) {
  var modaltype = event.relatedTarget.dataset.whatever;
  var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data('whatever'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-title').text('Edit / ' + modaltype);
    modal.find('.modal-body input').val(modaltype);
    // alert($('#editor1').val());
    CKEDITOR.instances.editor1.setData(button.data("value"));
    $('#editor1').attr('name', button.data('field'));
});

$(function() {
	$('#nav a[href~="' + location.href + '"]').parents('li').addClass('active');
});

</script>
