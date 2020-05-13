<!DOCTYPE html>
<html lang ="en">
<head>

    <?php $this->load->view('header'); ?>

</head>
<body>
    <div id="page-wrapper">
        <div class="pad25A">
        <?php $this->load->view('login_user');?>
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <h3 class="title-hero ">
                                Report
                            </h3>
                        </div>
                        <div class="col-sm-6 col-md-6 text-right">
                                <button type="button" class="btn btn-info mrg20B" id="add_data">
                                    Add Data &nbsp;
                                    <i class="glyph-icon icon-plus-square"></i>
                                </button>
                            </div>
                        </div>  
                    <div class="example-box-wrapper">
                    
                        
                        
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" id="example">
                        <thead>
                            <tr>
                                <th style="width:3px;">No</th>
                                <th>ID report</th>
                                <th>Report Name</th>
                                <th style="width:200px;">Date Created</th>
                                <th style="width:5px;">Result</th>
                                <th style="width:5px;">graph</th>
                                <th style="width:5px;">Edit</th>
                                <th style="width:5px;">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel" id="panel_form" style="display:none">
                <div class="panel-body">
                    <h3 class="title-hero">
                        Form Data
                    </h3>
                    <div id="dynamic_errmsg" class="alert alert-danger" style="display:none">
                        <p></p>
                    </div>
                    <div class="example-box-wrapper">
                        <form method="post" class="form-horizontal bordered-row" id="dynamic_form" data-parsley-validate>
                            <input name="id_report" id="id_report" type="hidden" value="" />
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Report</label>
                                <div class="col-sm-6">
                                    <input name="nama_report" id="nama_report" type="text" class="form-control" placeholder="Nama..." />
                                </div>
                            </div>
                            <div class="bg-default content-box text-center pad20A mrg25T">
                                <button class="btn btn-success" id="process">Process</button>
                                <button type="reset"  id="reset" class="btn btn-primary">Reset</button>
                                <button class="btn btn-black" id="close">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
    var table = '';
    var save_method; //for save method string
        $(document).ready(function() {
             table = $('#example').DataTable({
        
            "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "bLengthChange": true,
                "pageLength": 20,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('report/ajax_list/')?>",
                    "type": "POST"
                },
               
                //Set column definition initialisation properties.
                "columnDefs": [
                    { 
                        "targets": [ 0 ], //last column
                        "orderable": false, //set not orderable
                        "visible": true,
                        "searchable": false
                    },
                    { 
                        "targets": [ 1 ], //last column
                        "orderable": false, //set not orderable
                        "visible": false,
                        "searchable": false
                    },
                    { 
                        "targets": [ 4 ], //last column
                        "orderable": false, //set not orderable
                        "searchable": false
                    },
                    { 
                        "targets": [ 5 ], //last column
                        "orderable": false, //set not orderable
                        "searchable": false
                    },
                    { 
                        "targets": [ 6 ], //last column
                        "orderable": false, //set not orderable
                    },
                    { 
                        "targets": [ 6 ], //last column
                        "orderable": false, //set not orderable
                        "searchable": false
                    },
                ],
            

            });

            $('.dataTables_filter input').attr("placeholder", "Search...");
            $('#example tbody').on( 'click', 'tr', function () {
                $(this).toggleClass('selected');
               // var id = table.row(this).data();
               // alert( table.rows('.selected').data(). +' row(s) selected' );
               // alert( 'Clicked row id '+id[0].name()  );
                
            } );
        
            $('#button').click( function () {
                alert( table.rows('.selected').data().length +' row(s) selected' );
            } );

            $('#add_data').click(function() {
            clear_data();
            $('#panel_form').show();
            autoScrolling('#panel_form');
            save_method = 'insert';
            });

            $('#process').click(function() {
                save();

            });

           

           
        });
        function edit_report(id){
         save_method = 'update';
       
        $.ajax({
            url : "<?php echo site_url('report/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id_report"]').val(data.id_report);
                $('[name="nama_report"]').val(data.nama_report);
        
            },

            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
        $('#panel_form').show();
            autoScrolling('#panel_form');
        
        }

        function result_report(id){
            location.href = "<?php echo site_url('result')?>/"+id;
        }

        function graph_report(id){
            location.href = "<?php echo site_url('graph')?>/create/"+id;
        }
  
        function clear_data(){
            $('[name="nama_report"]').val('');
        }

        function save(){
           
            var url;
            var update;
            if(save_method == 'insert') {
                url = "<?php echo site_url('report/ajax_add')?>";
            } else {
                url = "<?php echo site_url('report/ajax_update')?>";
            }
             alert(url);
            // ajax adding data to database
            $.ajax({
                
                url : url,
                type: "POST",
                data: $('#dynamic_form').serialize(),
                dataType: "JSON",
                success: function(data)
                {

                    if(data.status) //if success close modal and reload ajax table
                    {
                     
                       reload_table();
                       // $('#panel_form').hide();
                      
                    }
                    else
                    {
                        
                        alert('Error Tambah/Update data karena Nomor Ketetapan sudah ada di Database');
                    
                    }
                 
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                  
                }
            })
        }

        function delete_report($id){
            if(confirm('Are you sure delete this data?'))
                {
                    // ajax delete data to database
                    $.ajax({
                        url : "<?php echo site_url('report/ajax_delete')?>/"+$id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data)
                        {
                            //if success reload ajax table
                           // $('#modal_form').modal('hide');
                          // alert('Success deleting data');
                            reload_table();
                           
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error deleting data');
                        }
                    });

                }
        }
        function reload_table()
        {
            table.ajax.reload(null,false); //reload datatable ajax 
            //table.fnClearTable(0);
            //table.fnDraw();
        }

        function autoScrolling(panel_id) {
            $('html, body').animate({
                scrollTop: $(panel_id).offset().top
            }, 700);
        }
    </script>
    <?php $this->load->view('footer'); ?>     
</body>
</html>