<html lang="en">
<head>
  <title>DataTablesJS.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- css -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>

  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css"/>

  <!-- js -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

    <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

  <!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script> -->


</head>
<body>
  <div class="container">
  <h1>dataTable</h1>
  <br>
    <div class="row">
      <div class="col">
        <table id="table" class="table table-striped table-bordered"/>
      </div>
    </div>
  </div>
<button type="button" class="btn btn-primary m-b5" data-toggle="modal" data-target="#insert">
  Insert
</button>
<button id="btnedit" type="button" class="btn btn-primary m-b5" data-toggle="modal" data-target="#edit" >
  Edit
</button>
<button id="delete" type="button" class="btn btn-primary m-b5">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="col-sm-2 control-label">Name</label>
          <div class="col-sm-10">
            <input class="form-control" name="name" id="name" type="text" placeholder="Enter you name">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input class="form-control" name="email" id="email" type="text" placeholder="Enter you email">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input class="form-control" name="password" id="password" type="password" placeholder="Enter you password">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submit" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal EDIT -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Insert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="col-sm-2 control-label">Id</label>
          <div class="col-sm-10">
            <input class="form-control" name="id" id="id2" type="text" placeholder="Enter you name">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Name</label>
          <div class="col-sm-10">
            <input class="form-control" name="nameEdit" id="nameEdit" type="text" placeholder="Enter you name">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input class="form-control" name="emailEdit" id="emailEdit" type="text" placeholder="Enter you email">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input class="form-control" name="passwordEdit" id="passwordEdit" type="text" placeholder="Enter you password">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="update" type="button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready( function () {
    let table = $('#table').DataTable( {
      ajax: {
        url: 'http://api.local.cronose/ca/datatable/userTable',
        dataSrc: '',
        type:"POST",
      },
      select: {
        style: 'os',
        items: 'row'  //row, column, cell
      },
      responsive: true,
      columns:  [
        {title: "DNI", data:'dni'},
        {title: "Name", data:'name'},
        {title: "Surname", data:'surname'},
        {title: "surname_2", data:'surname_2'},
        {title: "email", data:'email'},
        {title: "password", data:'password'},
        {title: "tag", data:'tag'},
        {title: "coins", data:'coins'},
        {title: "registration_date", data:'registration_date'},
        {title: "points", data:'points'},
        {title: "private", data:'private'},
        {title: "city_cp", data:'city_cp'},
        {title: "province_id", data:'province_id'},
        {title: "avatar_id", data:'avatar_id'},
        {title: "dni_photo_id", data:'dni_photo_id'}
      ]
    });

    // $('#submit').click(function(){
    //   var name = $('#name').val();
    //   var email = $('#email').val();
    //   var password = $('#password').val();
    //   console.log("hola");

    //   $.ajax({
    //     type:'POST',
    //     data:{name:name,email:email,password:password},
    //     url:"insert.php" //php page URL where we post this data to save in databse
    //   });
    // });


    // $('#btnedit').click(function(){

    //   var data = table.rows('.selected').data()[0];
    //   console.log(data);
    //   $('#id2').val(data['id']);
    //   $('#nameEdit').val(data['username']);
    //   $('#passwordEdit').val(data['email']);
    //   $('#emailEdit').val(data['password']);

    //   $('#update').click(function(){
    //     var id = $('#id2').val();
    //     var name = $('#nameEdit').val();
    //     var password = $('#passwordEdit').val();
    //     var email = $('#emailEdit').val();
    //     console.log("hola")
    //     $.ajax({
    //       type:'POST',
    //       data:{id: id, name:name,email:email,password:password},
    //       url:"update.php" //php page URL where we post this data to save in databse
    //     });
    //   });
    // });

    // $('#delete').click(function(){
    //   var id = table.rows('.selected').data()[0]['id'];
    //   console.log(id);
    //   $.ajax({
    //     type:'POST',
    //     data:{id: id},
    //     url:"delete.php"
    //   });
    // });

});
</script>
</body>
</html>
