<!-- login session -->
<?php
$user_login = $this->session->userdata('users_login');
$name       = $user_login['auth_menu'];
$username   = ucwords($user_login['username']);
$user_level = $user_login['user_level'];
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

        <nav class="my-2 my-md-0 wow fadeInUp">
          <?php
            if ($user_level == 'admin') {
                    echo '<span class="p-2 text-dark"><b>'.$username.'</b></span>
                          <a class="p-2 text-dark" href="/pariwisata/">Home</a>
                          <a class="p-2 text-dark" href="/pariwisata/admin/add_members">Add Member</a>
                          <a class="p-2 text-dark" href="/pariwisata/activity_log"> Log Activity</a>
                          <a class="fa fa-sign-out" href="/pariwisata/admin/logout"> Logout</a>';
            } elseif ($user_level == 'editor') {
                    echo '<span class="p-2 text-dark"><b>'.$username.'</b></span>
                          <a class="p-2 text-dark" href="/pariwisata/">Home</a>
                          <a class="fa fa-sign-out" href="/pariwisata/admin/logout"> Logout</a>';
            } else {
                    echo '<a class="p-2 text-dark" href="/pariwisata">Home</a>';
            }
          ?>

          <!-- <a class="p-2 text-dark" href="/pariwisata/home/dashboard">Dashboard</a> -->
          <!-- <a class="p-2 text-dark" href="/pariwisata/home/dashboard">Dashboard</a>'; -->
                    <!-- <a class="p-2 text-dark" href="/pariwisata/home/dashboard">Dashboard</a> -->
        </nav>

    </div>
  </div>
</header>
