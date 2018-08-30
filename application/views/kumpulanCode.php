<?php

//coding controller
print_r($_FILES);

if(isset($_GET[files]))
{
  var_dump($_GET['files']);
};

die("");

//ajax form input image view
$(function(){
  var files = [];
  $('input[type=file]').on('change', prepareupload);

  function prepareupload(event) {
    files[i] = event.target.files;
  }

  $("#submit").click(
    function() {

    var data = new FormData();
    var i =0;
    $.each(files[0], function(key, value)
    {
        data.append(i, value);
        i++;
    });

      $.ajax({
             url      : "<?php echo base_url('proses/add_image')?>",
             type     : "POST",
             data     : data, // serializes the form's elements.
             cache    : false,
             contentType : false,
             dataType: 'json',
             cache:false,
             processData : false,
             success  : function (data)
             {
               alert(data);
                 // if (feedback.status == "success") {
                 //    window.location.href = "<?php echo base_url('admin/input'); ?>";
                 // }
             },
             error:function(a,b){
               alert(a.statusText + a.responseText);
             }
           });
  });
});
