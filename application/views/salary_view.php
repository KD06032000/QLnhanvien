<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QUẢN LÝ NHÂN VIÊN</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

    </head> 
<body>
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">QUẢN LÝ NHÂN VIÊN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('index.php/default_controller')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Nhân Viên</span></a>
            </li>


            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('index.php/timekeeping')?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Chấm Công</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('index.php/salary')?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Lương</span></a>
            </li>
        </ul>
    <div class="container">
        

        <h3>QUẢN LÝ NHÂN VIÊN</h3>
        <br />
        <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add Person</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>manv</th>
                    <th>số ngày lương</th>
                    <th>tiền lương</th>
                    <th style="width:125px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
            <tr>
                <th>manv</th>
                <th>số ngày lương</th>
                <th>tiền lương</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>

<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('salary/ajax_list')?>",
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
    // $('.datepicker').datepicker({
    //     autoclose: true,
    //     format: "yyyy-mm-dd",
    //     todayHighlight: true,
    //     orientation: "top auto",
    //     todayBtn: true,
    //     todayHighlight: true,  
    // });

});



// function add_person()
// {
//     save_method = 'add';
//     $('#form')[0].reset(); // reset form on modals
//     $('.form-group').removeClass('has-error'); // clear error class
//     $('.help-block').empty(); // clear error string
//     $('#modal_form').modal('show'); // show bootstrap modal
//     $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
// }

// function edit_person(id)
// {
//     save_method = 'update';
//     $('#form')[0].reset(); // reset form on modals
//     $('.form-group').removeClass('has-error'); // clear error class
//     $('.help-block').empty(); // clear error string

//     //Ajax Load data from ajax
//     $.ajax({
//         url : "<?php echo site_url('person/ajax_edit/')?>/" + id,
//         type: "GET",
//         dataType: "JSON",
//         success: function(data)
//         {

//             $('[name="id"]').val(data.id);
//             $('[name="firstName"]').val(data.firstName);
//             $('[name="lastName"]').val(data.lastName);
//             $('[name="gender"]').val(data.gender);
//             $('[name="address"]').val(data.address);
//             $('[name="dob"]').datepicker('update',data.dob);
//             $('[name="status1"]').val(data.status1);
//             $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
//             $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

//         },
//         error: function (jqXHR, textStatus, errorThrown)
//         {
//             alert('Error get data from ajax');
//         }
//     });
// }

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

// function save()
// {
//     $('#btnSave').text('saving...'); //change button text
//     $('#btnSave').attr('disabled',true); //set button disable 
//     var url;

//     if(save_method == 'add') {
//         url = "<?php echo site_url('person/ajax_add')?>";
//     } else {
//         url = "<?php echo site_url('person/ajax_update')?>";
//     }

//     // ajax adding data to database
//     $.ajax({
//         url : url,
//         type: "POST",
//         data: $('#form').serialize(),
//         dataType: "JSON",
//         success: function(data)
//         {

//             if(data.status) //if success close modal and reload ajax table
//             {
//                 $('#modal_form').modal('hide');
//                 reload_table();
//             }

//             $('#btnSave').text('save'); //change button text
//             $('#btnSave').attr('disabled',false); //set button enable 


//         },
//         error: function (jqXHR, textStatus, errorThrown)
//         {
//             alert('Error adding / update data');
//             $('#btnSave').text('save'); //change button text
//             $('#btnSave').attr('disabled',false); //set button enable 

//         }
//     });
// }

// function delete_person(id)
// {
//     if(confirm('Are you sure delete this data?'))
//     {
//         // ajax delete data to database
//         $.ajax({
//             url : "<?php echo site_url('person/ajax_delete')?>/"+id,
//             type: "POST",
//             dataType: "JSON",
//             success: function(data)
//             {
//                 //if success reload ajax table
//                 $('#modal_form').modal('hide');
//                 reload_table();
//             },
//             error: function (jqXHR, textStatus, errorThrown)
//             {
//                 alert('Error deleting data');
//             }
//         });

//     }
// }

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Salary form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">manv</label>
                            <div class="col-md-9">
                                <input name="manv" placeholder="manv" class="form-control" type="text" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">songayluong</label>
                            <div class="col-md-9">
                                <input name="songayluong" placeholder="songayluong" class="form-control" type="text" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">tienluong</label>
                            <div class="col-md-9">
                                <input name="tienluong" placeholder="Status" class="form-control"></input>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>

</body>
</html>