
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<h1 style="font-size:20pt"> Master Data - <?php echo ucwords(str_replace('-', ' ', $this->uri->segment(3))); ?></h1><br/>
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <div id="myTabContent" class="tab-content">
                <table id="master_data" class="table table-striped table-bordered jambo_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Master Name</th>
                            <th>Category</th>
                            <th style="width:220px;">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
            //datatables
        table = $('#master_data').DataTable({

            "scrollY" 	: 450,
            "scrollX" 	: true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('master_data/ajax_list/'.$this->uri->segment(3)); ?>",
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

        //set input/textarea/select event when change value, remove class error and remove text help block
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

        $('#master_data_length').after(''+
            '<span class="btn btn-sm btn-primary" title="Add New Master Data" data-toggle="modal" data-target="#master_data_modal" onclick="javascript:add_divisi();">'+
                '<i class="glyphicon glyphicon-plus"></i>'+
                'Add New'+
            '</span>'+
        '');

        $( "#master_name" ).keyup(function() {
            TEXT_DESC = $("#master_name").val();
            TEXT_DESC = TEXT_DESC.replace (/[^a-z0-9]+|\s+/gmi, "-");
            TEXT_DESC = TEXT_DESC.toLowerCase();

            $("#master_slug").val(TEXT_DESC);
        });

        $('#btnSave').click(
            function() {
                $('#btnSave').text('saving...'); //change button text
                $('#btnSave').attr('disabled',true); //set button disable

                $.ajax({
                    url : "<?php echo site_url('master_data/ajax_add')?>",
                    type: "POST",
                    data: $('#formMasterData').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {
                        if (data.status == 'data_duplicate') {
							alert(' Duplicated \n Master data sudah ada');
						} else if(data.status == 'success') {
                            window.location.href = "<?php echo base_url('master_data/data/'.$this->uri->segment(3)); ?>";
                        }
                        else
                        {
                            for (var i = 0; i < data.inputerror.length; i++)
                            {
                                $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                                $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                            }
                        }
                        $('#btnSave').text('saved'); //change button text
                        $('#btnSave').attr('disabled',false); //set button enable

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                        $('#btnSave').text('saved'); //change button text
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
                    url : "<?php echo site_url('master_data/ajax_update')?>",
                    type: "POST",
                    data: $('#formMasterData').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {
						if (data.status == 'data_duplicate') {
							alert(' Duplicated \n Master data sudah ada');
						} else if(data.status == 'success') {
							window.location.href = "<?php echo base_url('master_data/data/'.$this->uri->segment(3)); ?>";
                        }
                        else
                        {
                            for (var i = 0; i < data.inputerror.length; i++)
                            {
                                $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                                $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                            }
                        }
                        $('#btnUpdate').text('Updated'); //change button text
                        $('#btnUpdate').attr('disabled',false); //set button enable
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                        $('#btnUpdate').text('Updated'); //change button text
                        $('#btnUpdate').attr('disabled',false); //set button enable

                    }
                });
            }
        );

    });

function edit_divisi(id) {
    $('#btnSave').hide();
    $('#btnUpdate').show();
    $('#btnUpdate').attr('disabled',false);

    $.ajax({
        url : "<?php echo site_url('master_data/ajax_edit')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#id').val(data.id);
            $('#master_name').val(data.master_name);
            $('#master_slug').val(data.master_slug);
            $('#master_category').val(data.master_category);
        }
    });
}

function add_divisi(){
  $('#master_name').val("");
}

function delete_divisi(id) {
    if(confirm('Are you sure delete this data?'))
    {
        $.ajax({
            url : "<?php echo site_url('master_data/ajax_delete')?>/"+id,
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
