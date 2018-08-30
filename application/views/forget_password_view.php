<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>asset.detikcom</title>
        <link href="<?php echo base_url('assets/images/icon/keys64.png'); ?>" rel="shortcut icon">
        <link href="<?php echo base_url('assets/login/css/style-admin.css'); ?>" rel="stylesheet" type="text/css">

        <!-- jQuery -->
        <script src="<?php echo base_url('assets/gentelella/vendors/jquery/dist/jquery.min.js'); ?>"></script>
		<!-- these css and js files are required by datatables -->
		<link href="<?php echo base_url(); ?>assets/modalgrid/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div id="login">
            <h1 style="text-align: center;">Forget Password</h1>

            <form method="post" name="formForget" id="formForget" action="#">
                <div id="error_message" style="color: red; display:none; text-align: center;">

                </div>
                <div class="form-group" style="margin-top: 10px;">
                    <label for="username">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required autofocus>
                    <span class="help-block"></span>
                </div>
                <p style="text-align: center;">
                    <button type="button" name="submit" id="submit">Reset Password</button>
                </p>
            </form>
            <footer><h2> <a href="http://asset.detik.com" >Asset@detikcom</h2></footer>
        </div>
    </body>
</html>

<script>
    $('#submit').click(
        function() {
            $.ajax({
                url : "<?php echo base_url('admin/login/do_forget_password')?>",
                type: "POST",
                data: $('#formForget').serialize(),
                success: function(response)
                {
                    if(response == 'user_not_exist') {
                        $('#error_message').show();
                        $('#error_message').text('Users Tidak ditemukan');
                    } else {
                        window.location.href = "<?php echo base_url(); ?>";
                    }
                }
            });
        }
    );
</script>
