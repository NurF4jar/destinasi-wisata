<!-- load user session -->
<?php
$user_login = $this->session->userdata('users_login');
$name       = $user_login['auth_menu'];
 ?>

<!--
Header
-->
<header class="p-3 px-md-4 bg-white border-bottom box-shadow">
  <div class="container ">
    <div class="d-flex flex-column flex-md-row align-items-center">
        <div class="logo my-0 mr-md-auto wow fadeInUp">
            Database
            <b>Pengembangan Destinasi Wisata</b>
        </div>
<?php
  if ($name == 'admin' || $name == 'editor') {
    echo '<nav class="my-2 my-md-0 wow fadeInUp">
              <span class="p-2 text-blue">Halo, <b>Admin!</b></span>
              <a class="fa fa-sign-out" href="admin/logout"> Logout</a>
	      <a class="p-2 text-blue" href="admin/add_members">Add Member</a>
            </nav>';
  } else {
    echo '<button type="button" class="btn btn-primary wow fadeInUp" data-toggle="modal" data-target="#modallogin">
      Login
    </button>';
  }
   
 ?>

    </div>
  </div>
</header>

<div id="modallogin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Login Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form name="formLogin" id="formLogin" action="#">
          <div id="error_message" style="color: red; display:none; text-align: center;">
          </div>

          <div class="col-auto">
            <label class="sr-only" for="username">Username</label>
            <div class="input-group mb-20">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-user"></i></div>
              </div>
              <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autofocus>
            </div>
          </div>

          <div class="col-auto">
            <label class="sr-only" for="password">Password</label>
            <div class="input-group mb-20">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-key"></i></div>
              </div>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" onkeydown="if(event.keyCode == 13) $('#submit').click()" required autofocus>
              <span class="help-block"></span>
            </div>
          </div>

          <p>
              <button class="btn btn-primary" type="button" name="submit" id="submit">Login</button>
              <!-- <a href="<?php echo base_url('login/forget_password'); ?>">
                  <span class="tambah">Forget Password</span>
              </a> -->
          </p>
          <!-- <div class="col-auto">
            <button type="submit" class="btn btn-success" action="<?php echo base_url(); ?>home">Login</button>
            <a class="btn btn-link" href="<?php echo base_url('home'); ?>">Forgot Your Password?</a>
        </div> -->
        </form>

      </div>

    </div>
  </div>
</div>
