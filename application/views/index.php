<!DOCTYPE html>
<html lang="en">

<?php $page="home"; ?>

<?php include "_head.php";?>

<body>

  <?php include "_header.php";?>

<!-- login session -->
  <?php
  $user_login = $this->session->userdata('users_login');
  $name       = $user_login['auth_menu'];
   ?>

  <section id="intro">
    <div class="intro-text">
      <h2>Regional 1</h2>
    </div>
	  <div class="container">
      <div class="maps">
    	     <div id="vmap" class="vmapx"></div>
      </div><!-- maps -->
    </div>
  </section>

   <!--
   S:PETA
   xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->


	<div class="tooltip_map inpo-11 indexdest-1">
        Prov. Nangroe Aceh Darussalam
    </div>

    <div class="tooltip_map inpo-12 indexdest-6">
         Prov.Sumatera Utara
    </div>

  	<div class="tooltip_map inpo-13 indexdest-11">
         Prov.Sumatera Barat
    </div>

  	<div class="tooltip_map inpo-14 indexdest-16">
         Prov.Riau
    </div>

  	<div class="tooltip_map inpo-21 indexdest-46">
         Prov.Kepulauan Riau
    </div>

  	<div class="tooltip_map inpo-15 indexdest-21">
         Prov.Jambi
    </div>

  	<div class="tooltip_map inpo-16 indexdest-26">
         Prov.Sumatera Selatan
    </div>

  	<div class="tooltip_map inpo-19 indexdest-41">
         Prov.Bangka Belitung
    </div>

  	<div class="tooltip_map inpo-17 indexdest-31">
         Prov.Bengkulu
    </div>

  	<div class="tooltip_map inpo-18 indexdest-36">
         Prov.Lampung
    </div>
    <!--
    E:PETA
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

    <?php include "_footer.php";?>

    <?php include "_js.php";?>

<!-- peta -->
<link   href="<?php echo base_url('assets/lib/peta/jqvmap.css'); ?>" media="screen" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('assets/lib/peta/jquery.vmap.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/lib/peta/jquery.vmap.sumatera.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('#vmap').vectorMap({
        map: 'pulausumatera',
        backgroundColor: false,
        borderColor: '#003481',
        borderOpacity: 0.25,
        borderWidth: 1,
        enableZoom: false,
        zoomOnScroll: false,
        zoomStep :9,
        hoverColor: '#ff8c00',
        hoverOpacity: false,
        normalizeFunction: 'linear',
        scaleColors: ['#b3f5ff', '#005ace'],
        selectedColor: '#c9dfaf',
        selectedRegion: true,
        showTooltip: false,
        scale:2,
        onRegionOver: function(element, code, region)
        {
            var message = ".inpo-" + code;
            $(this).mousemove(function(event){
          var msg = "Handler for .mousemove() called at ";
          var px  = 10 + event.pageX;
          var py  = 10 + event.pageY;
          $(message).css("left", px).css("top", py).css("position", "absolute");
        });
            $(message).show();
        },
        onRegionOut: function(element, code, region) {
          $(".satu").hide();
          var message = ".inpo-" + code;
          $(message).hide();
        },
        onRegionClick: function(element, code, region)
        {
            var message = "peta" + code;
            var id_destinasi = $(".inpo-" + code).attr('class').split(' ')[2]
            var id_destinasi = id_destinasi.replace("indexdest-","")

            //set linknya disini om fajar
        	//window.location= message + ".php#pp";

        	//keperluan prototipe
          window.location= "admin/input?id_provinsi="+code+"&id_destinasi=" + id_destinasi;

        }
    });

  });

  $('#submit').click(
      function() {
          $.ajax({
              url : "<?php echo base_url('login/validasi')?>",
              type: "POST",
              data: $('#formLogin').serialize(),
              success: function(response)
              {
                // alert(response);
                if(response == 'user_not_exist') {
                      $('#error_message').show();
                      $('#error_message').text('Users Tidak ditemukan, Silahkan hubungi administrator');
                  } else if (response == 'user_not_active') {
                      $('#error_message').show();
                      $('#error_message').text('Users Tidak Active, Silahkan hubungi administrator');
                  } else if (response == 'password_not_match') {
                      $('#password').parent().addClass('has-error')
                      $('#password').next().text('Password tidak cocok');
                  } else {
                      window.location.href = response;
                  }
              },
              error:function(a,b){
                alert(a.statusText + a.responseText);
              }
          });
      });

  </script>

</body>
</html>
