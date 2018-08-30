<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>asset.detik.com</title>
        <link href="<?php echo base_url('assets/images/icon/keys64.png'); ?>" rel="shortcut icon">
        <link href="<?php echo base_url('assets/login/css/style-admin.css'); ?>" rel="stylesheet" type="text/css">

        <!-- jQuery -->
        <script src="<?php echo base_url('assets/gentelella/vendors/jquery/dist/jquery.min.js'); ?>"></script>
		<!-- these css and js files are required by datatables -->
		<link href="<?php echo base_url(); ?>assets/modalgrid/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <meta name="copyright" content="IT ERP 2017"/>
    </head>

    <body>
        <div id="login">
            <h1>Login | IT ERP 2018</h1>

            <form name="formLogin" id="formLogin" action="#">
                <div id="error_message" style="color: red; display:none; text-align: center;">

                </div>
                <div class="form-group" style="margin-top: 10px;">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autofocus>
                    <span class="help-block"></span>
                </div>
                <div class="form-group" style="margin-top: 10px;">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" onkeydown="if(event.keyCode == 13) $('#submit').click()" required autofocus>
                    <span class="help-block"></span>
                </div>
                <p>
                    <button class="btn btn-primary" type="button" name="submit" id="submit">Login</button>
                    <a href="<?php echo base_url('login/forget_password'); ?>">
                        <button class="btn btn-danger"><span class="tambah">Forget Password</span></button>
                    </a>
                </p>
            </form>
            <footer><h2> <a href="https://asset.detik.com" >Asset Management System</h2></footer>
        </div>
    </body>
</html>

<script>
    $('#submit').click(
        function() {
            $.ajax({
                url : "<?php echo base_url('admin/login/validasi')?>",
                type: "POST",
                data: $('#formLogin').serialize(),
                success: function(response)
                {
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
                }
            });
        }
    );
</script>
