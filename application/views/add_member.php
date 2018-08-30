<!DOCTYPE html>
<html lang="en">

<?php $page="home"; ?>

<?php include "_head.php";?>

<body>

  <?php include "_header-login.php";?>

  <main>

      <div class="masthead" style="background-image: url('<?php echo base_url() ?>assets/images/sabuk.jpg')">
        <div class="container">

            <div class="pos flex-column flex-md-row ">

                <div class="page-heading ">
                   <h1>Pulau Sumatera / Provinsi Sumatera Utara</h1>
                </div>

                <div class="input-group select_prov">
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
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="">Dashboard</a></li>
              <li class="active">Add Member</li>
            </ol>
          </section>


          <section class="detail">

                <!-- Title -->
                <h1 class="judul">Add Member</h1>
                <p>
                    Silahkan tambahkan anggota dibawah ini
                </p>


                <div class="row">
                    <div class="col-md-6">

                        <form action="#" id="formUsersLogin" class="form-horizontal">
                          <div class="form-group">
                            <label for=" ">Nama User</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Nama User">
                          </div>
                          <div class="form-group">
                            <label for=" ">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                          </div>
                          <div class="form-group">
                            <label for=" ">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                          </div>
                          <div class="form-group">
                            <label for=" ">Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                          </div>
                          <div class="form-group">
                            <label for=" ">Divisi</label>
                            <select class="form-control" name="divisi" id="divisi">
                              <option value="1"> Wilayah 1 </option>
                              <option value="2"> Wilayah 2 </option>
                              <option value="3"> Wilayah 3 </option>
                              <option value="4"> Wilayah 4 </option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for=" ">Level User</label>
                            <select class="form-control" name="user_level" id="user_level">
                              <option value="viewer"> Viewer</option>
                              <option value="editor"> Editor </option>
                            </select>
                          </div>
                          <button type="button" id="btnSave" class="btn btn-primary">Save</button>
                          <button type="button" id="btnUpdate" class="btn btn-primary" style="display: none;">Update</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </form>

                    </div> <!-- col -->
                    <div class="col-md-6">
                        <p><b>List Nama yang Terdaftar</b></p>
                        <div class="wrap-table">
                          <table class="custom">
                              <tbody>
                                <tr>
                                  <th>Nama</th>
                                  <th>Level</th>
                                  <th>Divisi</th>
                              </tr>
                              <?php foreach ($list_user as $list):
                                $username   = $list->username;
                                $user_level = $list->user_level;
                                if ($list->divisi == 1) {
                                  $divisi = 'Wilayah Satu';
                                } elseif($list->divisi == 2) {
                                  $divisi = 'Wilayah Dua';
                                } elseif($list->divisi == 3) {
                                  $divisi = 'Wilayah Tiga';
                                } elseif($list->divisi == 4) {
                                  $divisi = 'Wilayah Empat';
                                } else {
                                  $divisi = 'Administrator';
                                }

                                echo "<tr>
                                    <td> $username </td>
                                    <td> $user_level </td>
                                    <td> $divisi </td>
                                </tr>";
                              endforeach; ?>

                              </tbody>
                          </table>
                        </div>
                    </div> <!-- col -->
                </div> <!-- row -->


          </section>

      </div><!-- container -->

  </main>

  <?php include "_footer.php";?>

  <?php include "_js.php";?>

</body>
</html>

<script type="text/javascript">
    $(document).ready(function() {

        //set input/textarea/select event when change value, remove class error and remove text help block
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

        $('#users_table_length').after(''+
            '<span class="btn btn-sm btn-primary" title="Add New Users Login" data-toggle="modal" data-target="#users_modal">'+
                '<i class="glyphicon glyphicon-plus"></i>'+
                'Add New'+
            '</span>'+
        '');

        $( "#fixed_name" ).keyup(function() {
            TEXT_DESC = $("#fixed_name").val();
            TEXT_DESC = TEXT_DESC.replace (/[^a-z0-9]+|\s+/gmi, "-");
            TEXT_DESC = TEXT_DESC.toLowerCase();

            $("#fixed_slug").val(TEXT_DESC);
        });

        $('#btnSave').click(
            function() {
                $('#btnSave').text('saving...'); //change button text
                $('#btnSave').attr('disabled',true); //set button disable

                $.ajax({
                    url : "<?php echo site_url('users/ajax_add')?>",
                    type: "POST",
                    data: $('#formUsersLogin').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {
                        if(data.status) //if success close modal and reload ajax table
                        {
                            //$('#users_modal').hide();
                            window.location.href = "<?php echo base_url('users'); ?>";
                        }
                        else
                        {
                            for (var i = 0; i < data.inputerror.length; i++)
                            {
                                $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                                $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                            }
                        }
                        $('#btnSave').text('save'); //change button text
                        $('#btnSave').attr('disabled',false); //set button enable


                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                        $('#btnSave').text('save'); //change button text
                        $('#btnSave').attr('disabled',false); //set button enable

                    }
                });
            }
        );

        $('#btnUpdate').click(
            function() {
                $('#btnUpdate').text('Updating...'); //change button text
                $('#btnUpdate').attr('disabled',true); //set button disable

                $.ajax({
                    url : "<?php echo site_url('users/ajax_update')?>",
                    type: "POST",
                    data: $('#formUsersLogin').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {
                        if(data.status) //if success close modal and reload ajax table
                        {
                            //$('#users_modal').hide();
                            window.location.href = "<?php echo base_url('users'); ?>";
                        }
                        else
                        {
                            for (var i = 0; i < data.inputerror.length; i++)
                            {
                                $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                                $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                            }
                        }
                        $('#btnSave').text('save'); //change button text
                        $('#btnSave').attr('disabled',false); //set button enable


                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                        $('#btnUpdate').text('Update'); //change button text
                        $('#btnUpdate').attr('disabled',false); //set button enable

                    }
                });
            }
        );

    });

function edit_divisi(id) {
    $('#btnSave').hide();
    $('#btnUpdate').show();

    $.ajax({
        url : "<?php echo site_url('users/ajax_edit')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#id').val(data.id);
            $('#username').val(data.username);
            $('#email').val(data.email);
            $('#password').val(data.password);
            $('#confirm_password').val(data.password);
            $('#user_level option[value="'+data.user_level+'"]').prop('selected', 'selected');
            $('#divisi option[value="'+data.divisi+'"]').prop('selected', 'selected');
            $('#divisi').val(data.divisi).change();
        }
    });
}

function delete_divisi(id) {
    if(confirm('Are you sure delete this data?'))
    {
        $.ajax({
            url : "<?php echo site_url('users/ajax_delete')?>/"+id,
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                window.location.reload();
            }
        });
    }
}

function active_divisi(id) {
    if(confirm('Are you sure Active this User?'))
    {
        $.ajax({
            url : "<?php echo site_url('users/ajax_active')?>/"+id,
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                window.location.reload();
            }
        });
    }
}

function deactive_divisi(id) {
    if(confirm('Are you sure Deactive this User?'))
    {
        $.ajax({
            url : "<?php echo site_url('users/ajax_deactive')?>/"+id,
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                window.location.reload();
            }
        });
    }
}
</script>
