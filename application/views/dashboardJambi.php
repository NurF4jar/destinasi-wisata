<!DOCTYPE html>
<html lang="en">

<?php $page="home"; ?>

<?php include "_head.php";?>

<body>

  <?php include "_header-login.php";?>

  <main>

      <div class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/images/sabuk.jpg')">
        <div class="container">

            <div class="pos flex-column flex-md-row ">

                <div class="page-heading ">
                   <h1>Pulau Sumatera / Provinsi Jambi</h1>
                </div>

                <div class="input-group select_prov">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Pilih Provinsi</label>
                  </div>
                  <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Pilih Provinsi</option>
                    <option id="1" value="">Prov. Aceh</option>
                    <option id="2" value="">Prov. Sumatera Utara</option>
                    <option id="3" value="">Prov. Riau</option>
                    <option id="4" value="">Prov. Sumatera Barat </option>
                    <option id="5" value="">Prov. Kepulauan Riau </option>
                    <option id="6" value="">Prov. Jambi </option>
                    <option id="7" value="">Prov. Bengkulu </option>
                    <option id="8" value="">Prov. Sumatera Selatan </option>
                    <option id="9" value="">Prov. Kepulauan Bangka Belitung </option>
                    <option id="10" value="">Prov. Lampung </option>
                  </select>
                </div>

            </div>

        </div>
      </div>



      <div class="container">

          <!-- box destinasi -->
          <div class="card destinasi wow fadeInUp">

            <div class="card-body">
                  <b>Top 5 Favorite Destination :</b>
                  <a href="" class="active">Provinsi Jambi</a>
                  <a href="" class="">Destinasi 1</a>
                  <a href="" class="">Destinasi 2</a>
                  <a href="" class="">Destinasi 3</a>
                  <a href="" class="">Destinasi 4</a>
                  <a href="" class="">Destinasi 5</a>
                  <!-- <a href="" class="">elypsys Codeigniter</a> -->
                  <!-- <a href=""data-toggle="modal" data-target="#modalform_destinasi" class="edit">[edit]</a> -->
            </div>
          </div>


          <section class="content-header">
            <h1>
              Dashboard
              <small>Prov. Jambi</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol>
          </section>


          <section class="category">

            <div class="row">
                <div class="col-md-4 mb-20">
                  <div class="card box-shadow wow fadeInLeft">
                    <h5 class="card-title">Foto Gallery</h5>
                    <!-- <img class="pict" src="images/foto-1.jpg"> -->


                    <div class="">
                    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
                    <div id="slidedetail" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner" role="listbox">

                        <div class="carousel-item active">
                          <a href="<?php echo base_url(); ?>assets/images/jambi/jambi1.png" class="gallery-popup" title="<b>Peta Provinsi Jambi</b>">
                          <img class="d-block img-fluid" src="<?php echo base_url(); ?>assets/images/jambi/jambi1.png" alt=" ">
                            <div class="carousel-caption">
                              <p>
                                <b>Peta Provinsi Jambi</b>
                              </p>
                            </div>
                          </a>
                        </div>

                        <div class="carousel-item">
                          <a href="<?php echo base_url(); ?>assets/images/jambi/jambi2.png" class="gallery-popup" title="<b>Gunung Kerinci</b>">
                          <img class="d-block img-fluid" src="<?php echo base_url(); ?>assets/images/jambi/jambi2.png" alt=" ">
                            <div class="carousel-caption">
                              <p>
                                <b>Gunung Kerinci</b>
                              </p>
                            </div>
                            </a>
                        </div>

                        <div class="carousel-item">
                          <a href="<?php echo base_url(); ?>assets/images/jambi/jambi3.png" class="gallery-popup" title="<b>Arum Jeram</b>">
                          <img class="d-block img-fluid" src="<?php echo base_url(); ?>assets/images/jambi/jambi3.png" alt=" ">
                            <div class="carousel-caption">
                              <p>
                                <b>Arum Jeram</b>
                              </p>
                            </div>
                          </a>
                        </div>

                        <div class="carousel-item">
                          <a href="<?php echo base_url(); ?>assets/images/jambi/jambi4.png" class="gallery-popup" title="<b>Wisata Candi</b>">
                          <img class="d-block img-fluid" src="<?php echo base_url(); ?>assets/images/jambi/jambi4.png" alt=" ">
                            <div class="carousel-caption">
                              <p>
                                <b>Wisata Candi</b>
                              </p>
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
                            <button type="button" class="btn btn-sm btn-outline-secondary"  data-toggle="modal" data-target="#modalform_img" data-whatever="Foto Gallery">Edit</button>
                          </div>
                        </div>
                    </div>

                  </div>
                </div>
                <div class="col-md-4 mb-20">
                  <div class="card box-shadow wow fadeInUp">
                    <h5 class="card-title">Atraksi</h5>
                    <div class="card-body">
                      <p class="card-text">
                        <?php
                        echo "string";
                         ?>
                          <!-- Wisata Alam, terdapat atraksi alam berupa:
                          - Danau Toba <br>
                          - Gunung Sibanyak <br>
                          - Pulau Nias <br>
                          - Tangkahan <br>

                          Wisata Buatan, Terdapat Wisata Iman Sidikalang,
                          Gardu Pandang Tele, Taman Buah Brastagi -->
                      </p>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="<?php echo base_url(); ?>home/detail" type="button" id="view" class="btn btn-sm btn-outline-secondary">View</a>
                            <button type="button" class="btn btn-sm btn-outline-secondary"  data-toggle="modal" data-target="#modalform" data-whatever="Atraksi">Edit</button>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-20">
                  <div class="card box-shadow wow fadeInRight">
                    <h5 class="card-title">Amenitas</h5>
                    <div class="card-body">
                      <p class="card-text">
                          Pertumbuhan hotel di Sumatera Utara:
                          <img src="<?php echo base_url(); ?>assets/images/fasilitas-tabel.jpg" alt="">
                      </p>

                    </div>
                    <div class="card-footer text-muted">
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <a href="<?php echo base_url(); ?>home/detail" class="btn btn-sm btn-outline-secondary">View</a>
                              <button type="button" class="btn btn-sm btn-outline-secondary"  data-toggle="modal" data-target="#modalform" data-whatever="Fasilitas">Edit</button>
                            </div>

                          </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 mb-20">
                  <div class="card box-shadow wow fadeInLeft">
                    <h5 class="card-title">Aksesbilitas</h5>
                    <div class="card-body">
                      <p class="card-text">
                         <b>Udara :</b><br>
                          - Bandar Udara International Kualanamu <br>
                            (Maskapai: Lion Air, Citilink, Garuda Indonesia)<br>
                          - Bandara Udara International Silangit
                            (Maskapai : Batik Air, Citilink, Garuda Indonesia,      Sriwijaya)<br>
                          - Bandara Udara Binaka<br>
                          - Bandara Udara FL Tobing<br>
                          - Bandara Sibisa<br>
                      </p>
                    </div>

                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="<?php echo base_url(); ?>home/detail" class="btn btn-sm btn-outline-secondary">View</a>
                            <button type="button" class="btn btn-sm btn-outline-secondary"  data-toggle="modal" data-target="#modalform" data-whatever="Aksesbilitas">Edit</button>
                          </div>

                        </div>
                    </div>

                  </div>
                </div>
                <div class="col-md-4 mb-20">
                  <div class="card box-shadow wow fadeInUp">
                    <h5 class="card-title">Data Wisatawan</h5>
                    <div class="card-body">
                      <p class="card-text">
                          <img src="<?php echo base_url(); ?>assets/images/data-wisatawan-tabel.jpg" alt="">
                      </p>

                    </div>

                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="<?php echo base_url(); ?>home/detail" class="btn btn-sm btn-outline-secondary">View</a>
                            <button type="button" class="btn btn-sm btn-outline-secondary"  data-toggle="modal" data-target="#modalform" data-whatever="Data Wisatawan">Edit</button>
                          </div>

                        </div>
                    </div>

                  </div>
                </div>
                <div class="col-md-4 mb-20">
                  <div class="card box-shadow wow fadeInRight">
                    <h5 class="card-title">Kontribusi</h5>
                    <div class="card-body">
                      <p class="card-text">
                        <b>Kontribusi Parawisata Prov. Sumatera Utara bagi pembangunan tahun 2015</b><br>
                        Kunjungan Wisman : 229.228<br>
                        Devisa USD : 229.288.000<br>

                        <b>Proyeksi tahun 2019</b><br>
                        Kunjungan Wisman : 1.000.000<br>
                        Devisa USD : 1.000.000.000<br>
                      </p>

                    </div>

                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="<?php echo base_url(); ?>home/detail" class="btn btn-sm btn-outline-secondary">View</a>
                            <button type="button" class="btn btn-sm btn-outline-secondary"  data-toggle="modal" data-target="#modalform" data-whatever="Kontribusi">Edit</button>
                          </div>

                        </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card box-shadow wow fadeInLeft">
                    <h5 class="card-title">Pengembangan Desa Wisata</h5>
                    <div class="card-body">
                      <p class="card-text">
                          <b>Pengembangan desa Wisata di DPP Toba </b> <br>
                          - Kep. Bupati Samosir No: 145 Tahun 2017: <br>
                            Kawasan Pedesaan Pasir Putih Parbaba di Kab.      Samosir.<br>
                          - SK. Bup. No. 188.45/3499/BPPD/2015:<br>
                            Kawasan pedesaan wisata berbasis Sumber daya alam panas bumi di kab. Simalungun.<br>
                          - SK. Bup. No. 188.45/3499/BPPD/2015:<br>
                      </p>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="<?php echo base_url(); ?>home/detail" class="btn btn-sm btn-outline-secondary">View</a>
                            <button type="button" class="btn btn-sm btn-outline-secondary"  data-toggle="modal" data-target="#modalform" data-whatever="Pengembangan Desa Wisata">Edit</button>
                          </div>

                        </div>
                    </div>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card box-shadow wow fadeInUp">
                    <h5 class="card-title">Dokumen Perencanaan</h5>
                    <div class="card-body">
                      <p class="card-text">
                            Berdasarkan PP No. 50 tahun 2011 tentang RIPPARNAS, Provinsi Sumatera Utara terbagi menjadi dua DPN, 3 KSPN dan 7 KPPN: <br>
                            <img src="<?php echo base_url(); ?>assets/images/dokumen-perencanaan-tabel.jpg" alt="">
                      </p>
                    </div>

                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="<?php echo base_url(); ?>home/detail" class="btn btn-sm btn-outline-secondary">View</a>
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modalform" data-whatever="Dokumen Perencanaan">Edit</button>
                          </div>

                        </div>
                    </div>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card box-shadow wow fadeInRight">
                    <h5 class="card-title">Dana Alokasi Khusus (DAK)</h5>
                    <div class="card-body">
                      <p class="card-text">
                            <img src="<?php echo base_url(); ?>assets/images/dana-lokasi-tabel.jpg" alt="">
                      </p>
                    </div>

                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="<?php echo base_url(); ?>home/detail" class="btn btn-sm btn-outline-secondary">View</a>
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modalform" data-whatever="Dana Lokasi Khusus (DAK)">Edit</button>
                          </div>

                        </div>
                    </div>

                  </div>
                </div>
            </div><!-- row -->

          </section> <!-- listcard -->


          <!-- s:modal edit categori -->

          <!-- Modal -->
          <div class="modal fade" id="modalform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Form Edit </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>

                      <label for="message-text" class="col-form-label">Silahkan Isi:</label>
                      <textarea id="editor1" class="form-control" name="editor1" rows="10" cols="80">
                            This is my textarea to be replaced with CKEditor.
                      </textarea>

                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary"> <i class="fa fa-save"></i> Simpan</button>
                </div>
              </div>
            </div>
          </div>


           <!-- Modal upload foto -->
          <div class="modal fade" id="modalform_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Foto Gallery</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="row">
                          <div class="col-md-4">

                              <div id="image-preview">
                                <label for="image-upload" id="image-label">Upload Foto ke-1</label>
                                <input type="file" name="image" id="image-upload"/>
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Keterangan Foto 1</label>
                                <textarea  class="form-control" name=" " row="10"> </textarea>
                              </div>

                          </div>
                          <div class="col-md-4">

                              <div id="image-preview1">
                                <label for="image-upload1" id="image-label1">Upload Foto ke-2</label>
                                <input type="file" name="image" id="image-upload1" />
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Keterangan Foto 2</label>
                                <textarea  class="form-control" name=" " row="10"> </textarea>
                              </div>

                          </div>
                          <div class="col-md-4">

                              <div id="image-preview2">
                                <label for="image-upload" id="image-label2">Upload Foto ke-3</label>
                                <input type="file" name="image" id="image-upload2" />
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Keterangan Foto 3</label>
                                <textarea  class="form-control" name=" " row="10"> </textarea>
                              </div>

                          </div>
                          <div class="col-md-4">
                              <div id="image-preview3">
                                <label for="image-upload" id="image-label3">Upload Foto ke-4</label>
                                <input type="file" name="image" id="image-upload3" />
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Keterangan Foto 4</label>
                                <textarea  class="form-control" name=" " row="10"> </textarea>
                              </div>
                          </div>
                           <div class="col-md-4">
                              <div id="image-preview4">
                                <label for="image-upload" id="image-label4">Upload Foto ke-5</label>
                                <input type="file" name="image" id="image-upload4" />
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Keterangan Foto 5</label>
                                <textarea  class="form-control" name=" " row="10"> </textarea>
                              </div>
                          </div>

                          <div class="col-md-4">

                            <b>Note:</b><br>
                            File gambar maksimal 20 mb <br>
                            Maksimal 5 foto <br>

                          </div>
                    </div><!-- row -->
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary"> <i class="fa fa-save"></i> Simpan</button>
                </div>
              </div>
            </div>
          </div>


          <!-- Modal destinasi-->
          <div class="modal fade" id="modalform_destinasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Favorite Destination</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="dashboard.php" method="POST">
                      <label for="message-text" class="col-form-label">Silahkan Isi:</label>
                      <input type="text" class="form-control" id=" " placeholder="Favorite Destinasi">
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" onclick="window.location.href='dashboard.php'"> <i class="fa fa-save"></i> Simpan</button>
                </div>
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
