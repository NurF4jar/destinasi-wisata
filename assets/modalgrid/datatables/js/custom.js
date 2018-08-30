			
var save_method; //for save method string
var table;

$(document).ready(function() {
	
        //datatables
    table = $('#proc_table').DataTable({ 

		"scrollY" 	: 450,
		"scrollX" 	: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('procurement/ajax_list')?>",
            "type": "POST"
			
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [-1], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
	

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

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
	
	

});



function add_proc()
{
    save_method = 'add';
    $('#proc_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#proc_modal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add procurement'); // Set Title to Bootstrap modal title
}

function edit_proc(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('procurement/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

//            $('[name="id"]').val(data.id);
			$('[name="order_id"]').val(data.order_id);
            $('[name="orderdetil_descr"]').val(data.orderdetil_descr);
            $('[name="orderdetil_qty"]').val(data.orderdetil_qty);
            $('[name="orderdetil_idr"]').val(data.orderdetil_idr);
            $('[name="orderdetil_rowtotalidr_incldisc"]').val(data.orderdetil_rowtotalidr_incldisc);
			$('[name="orderdetil_pphpercent"]').val(data.orderdetil_pphpercent);
			$('[name="orderdetil_ppnpercent"]').val(data.orderdetil_ppnpercent);
			$('[name="currency_id"]').val(data.currency_id);
			$('[name="orderdetil_discount"]').val(data.orderdetil_discount);
			$('[name="orderdetil_foreignrate"]').val(data.orderdetil_foreignrate);
			$('[name="orderdetil_rowtotalforeign_incltax"]').val(data.orderdetil_rowtotalforeign_incltax);
            $('#proc_modal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Order'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{												
    table.ajax.reload(null,false); //reload datatable ajax 
}
	
function save_proc() //Proses post modal form form insyosys to procurement
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('insyo/ajax_add')?>";
    } else {
        url = "<?php echo site_url('insyo/ajax_add')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#proc_modal').modal('hide'); 
               	reload_table();
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

function delete_proc(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('procurement/ajax_delete')?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
				//if success reload ajax table
                $('#proc_modal').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
               {
                alert('Error deleting data');
            }
        });
		
    }
}
			


$(document).ready(function() {
	
        //datatables
    table = $('#acc_table').DataTable({ 

		"scrollY" 	: 450,
		"scrollX" 	: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('accounting/ajax_list')?>",
            "type": "POST"
        },

		//Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
	
    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

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
	
	

});

	
function add_acc()
{
    save_method = 'add';
    $('#acc_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#accmodal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add accounting'); // Set Title to Bootstrap modal title
}

function edit_acc(id)
{
    save_method = 'update';
    $('#acc_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('accounting/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

//            $('[name="id"]').val(data.id);
			$('[name="order_id"]').val(data.order_id);
            $('[name="no_serial"]').val(data.no_serial);
            $('[name="barcode"]').val(data.barcode);
            $('[name="kategori_asset"]').val(data.kategori_asset);
            $('[name="usia_asset"]').val(data.usia_asset);
            $('[name="image_barcode"]').val(data.image_barcode);
			$('[name="keterangan"]').val(data.keterangan);
			$('#accmodal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Order'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{												
    table.ajax.reload(null,true); //reload datatable ajax 
}
	
function save_acc()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('accounting/ajax_add')?>";
    } else {
        url = "<?php echo site_url('accounting/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#acc_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#accmodal_form').modal('hide');
               	reload_table();
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

function delete_acc(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('accounting/ajax_delete')?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
				//if success reload ajax table
                $('#accmodal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
               {
                alert('Error deleting data');
            }
        });

    }
}



$(document).ready(function() {
	
        //datatables
    table = $('#ga_table').DataTable({ 

		"scrollY" 	: 450,
		"scrollX" 	: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('ga/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
	

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

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
	
	

});



function add_ga()
{
    save_method = 'add';
    $('#ga_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#gamodal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add GA'); // Set Title to Bootstrap modal title
}

function edit_ga(id)
{
    save_method = 'update';
    $('#ga_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('ga/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="no_serial"]').val(data.no_serial);
            $('[name="no_garansi"]').val(data.no_garansi);
            $('[name="periode_garansi"]').val(data.periode_garansi);
            $('[name="kondisi_item"]').val(data.kondisi_item);
            $('[name="tgldist_item"]').val(data.tgldist_item);
			$('[name="keterangan"]').val(data.keterangan);
			$('#gamodal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Order'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table(id)
{												
    table.ajax.reload(null,false); //reload datatable ajax 
}
	
function save_ga(id)
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('ga/ajax_add')?>";
    } else {
        url = "<?php echo site_url('ga/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#ga_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#gamodal_form').modal('hide');
               	reload_table();
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

function delete_ga(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('ga/ajax_delete')?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
				//if success reload ajax table
                $('#gamodal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
               {
                alert('Error deleting data');
            }	
        });

    }
}


$(document).ready(function() {
	
        //datatables
    table = $('#it_table').DataTable({ 

		"scrollY" 	: 450,
		"scrollX" 	: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('it/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
	

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

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
	
	

});



function add_it()
{
    save_method = 'add';
    $('#it_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#it_modal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add it'); // Set Title to Bootstrap modal title
}

function edit_it(id)
{
    save_method = 'update';
    $('#it_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('it/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

//            $('[name="id"]').val(data.id);
			$('[name="no_serial"]').val(data.no_serial);
            $('[name="npk"]').val(data.npk);
            $('[name="nama"]').val(data.nama);
            $('[name="divisi"]').val(data.divisi);
            $('[name="lokasi"]').val(data.lokasi);
			$('[name="type_item"]').val(data.type_item);
			$('[name="manufaktur_item"]').val(data.manufaktur_item);
			$('[name="model_item"]').val(data.model_item);
			$('[name="warranty_item"]').val(data.warranty_item);
			$('[name="hdx_item"]').val(data.hdx_item);
			$('[name="ram_item"]').val(data.ram_item);
			$('[name="cpu_item"]').val(data.cpu_item);
			$('[name="keterangan"]').val(data.keterangan);
			$('#it_modal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('IT Items'); // Set title to Bootstrap modal title
			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

						
function reload_table_it(id)
{												
    table.ajax.reload(null,false); //reload datatable ajax 
}
	
function save_it(id)
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('it/ajax_add')?>";
    } else {
        url = "<?php echo site_url('it/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#it_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#it_modal').modal('hide');
               	reload_table_it(id);
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

function delete_it(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('it/ajax_delete')?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
				//if success reload ajax table
                $('#it_modal').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
               {
                alert('Error deleting data');
            }
        });

    }
}


$(document).ready(function() {
	
        //datatables
    table = $('#insyo_table').DataTable({ 

		"scrollY" 	: 450,
		"scrollX" 	: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('insyo/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
	

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

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
	
	

});



function add_insyo()
{
    save_method = 'add';
    $('#insyo_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#insyo_modal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Insyosys'); // Set Title to Bootstrap modal title
}

function edit_insyo(id)
{
    save_method = 'update';
    $('#insyo_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('insyo/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

			$('[name="proc_id"]').val(data.proc_id);
			$('[name="order_id"]').val(data.order_id);
            $('[name="orderdetil_descr"]').val(data.orderdetil_descr);
            $('[name="orderdetil_qty"]').val(data.orderdetil_qty);
            $('[name="orderdetil_idr"]').val(data.orderdetil_idr);
            $('[name="orderdetil_rowtotalidr_incldisc"]').val(data.orderdetil_rowtotalidr_incldisc);
			$('[name="currency_id"]').val(data.currency_id);
			$('[name="orderdetil_discount"]').val(data.orderdetil_discount);
			$('[name="orderdetil_pphpercent"]').val(data.orderdetil_pphpercent);
			$('[name="orderdetil_ppnpercent"]').val(data.orderdetil_ppnpercent);
			$('[name="orderdetil_foreignrate"]').val(data.orderdetil_foreignrate);
			$('[name="orderdetil_rowtotalforeign_incltax"]').val(data.orderdetil_rowtotalforeign_incltax);
            $('[name="order_date"]').val(data.order_date);
			$('[name="order_come"]').val(data.order_come);
			$('[name="rekanan_id"]').val(data.rekanan_id);
			$('[name="kategori_id"]').val(data.kategori_id);
			$('[name="keterangan"]').val(data.keterangan);
			$('#insyo_modal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Order'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{												
    table.ajax.reload(null,false); //reload datatable ajax 
}
	
function save_insyo()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('insyo/ajx_add')?>";
    } else {
        url = "<?php echo site_url('insyo/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#insyo_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#insyo_modal').modal('hide');
               	reload_table();
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

function delete_insyo(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('insyo/ajax_delete')?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
				//if success reload ajax table
                $('#insyo_modal').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
               {
                alert('Error deleting data');
            }
        });

    }
}
