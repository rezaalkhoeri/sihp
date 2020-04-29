@extends('sihp.master')
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Criteria</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header">
                <button type="button" id="add-button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> New Criteria</button>
                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></button>
                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-file-excel-o"></i> </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Action</th>                  
                </tr>
                </thead>
                <tbody>
                  @php($no = 1)
                  @foreach($criteria as $row)                  
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{ $row->Name }}</td>
                    <td>
                      <button type="button" class="btn btn-primary btn-sm edit-button" data-button="{{$row->CriteriaID}}" ><i class="fa fa-pencil"></i></button> 
                      <button type="button" class="btn btn-danger btn-sm get-delete-button" data-button="{{$row->CriteriaID}}" ><i class="fa fa-trash"></i></button> 
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#add-button').on('click', function () {
        $('#add').modal('show');

        $('.modal-title').empty();
        $('.modal-title').text('Add New Criteria');

        $('.input-body').empty();
        let body = '<label for="Criteria"> Criteria Name </label>'
        + '<input class="form-control input-sm" type="text" id="criteria" name="criteriaName" placeholder="Criteria Name">'
        $('.input-body').append(body);      
    });

    $('#save-button').on('click', function () {
        let route = "{{route('add-criteria')}}";
        let criteriaName = $('#criteria').val();
        var csrfToken = $('input[name ="_token"]').val();        

        $( "#ajax-wait" ).css({
          left: ( $( window ).width() - 32 ) / 2 + "px", // 32 = lebar gambar
          top: ( $( window ).height() - 32 ) / 3 + "px", // 32 = tinggi gambar
          display: "block"
        })
        $('#loader').addClass("add-loader");

        $.ajax({
          headers: {
              'X-CSRF-Token': csrfToken
          },
          url: route,
          type: "POST",
          data: "data=" + JSON.stringify(criteriaName),
          dataType: "json",
          success: function(data) {
              $('#loader').removeClass("add-loader");
              $( "#ajax-wait" ).fadeOut();
              location.reload();

              $(document).ready(function() {
                swal("Success!", data.message, data.alert);
              });
          },
          error: function(data) {
              $('#loader').removeClass("add-loader");
              $( "#ajax-wait" ).fadeOut();
  
              $(document).ready(function() {
                swal("Error!", "Add New Criteria Failed!", "error");
              });
          }
        });

    });

    $('.edit-button').on('click', function () {
        $( "#ajax-wait" ).css({
          left: ( $( window ).width() - 32 ) / 2 + "px", // 32 = lebar gambar
          top: ( $( window ).height() - 32 ) / 3 + "px", // 32 = tinggi gambar
          display: "block"
        })
        $('#loader').addClass("add-loader");

        let idCriteria = $.parseJSON($(this).attr('data-button'));
        let route = "{{route('edit-criteria')}}";
        var csrfToken = $('input[name ="_token"]').val();        

        $.ajax({
          headers: {
              'X-CSRF-Token': csrfToken
          },
          url: route,
          type: "POST",
          data: "data=" + JSON.stringify(idCriteria),
          dataType: "json",
          success: function(data) {              
              $('#loader').removeClass("add-loader");
              $( "#ajax-wait" ).fadeOut();
              
              $('#edit').modal('show');

              $('.modal-title').empty();
              $('.modal-title').text('Edit Criteria');

              $('.input-body').empty();
              let body = '<label for="Criteria"> Criteria Name </label>'
              + '<input class="form-control input-sm" type="hidden" value="'+ data[0].CriteriaID +'" id="idCriteria" name="criteriaID">'
              + '<input class="form-control input-sm" type="text" value="'+ data[0].Name +'" id="criteria" name="criteriaName" placeholder="Criteria Name">'
              $('.input-body').append(body);
          },
          error: function(data) {
              $('#loader').removeClass("add-loader");
              $( "#ajax-wait" ).fadeOut();
  
              $(document).ready(function() {
                swal("Error!", "Get data error!", "error");
              });
          }
        });

    });

    $('#update-button').on('click', function () {
        $( "#ajax-wait" ).css({
          left: ( $( window ).width() - 32 ) / 2 + "px", // 32 = lebar gambar
          top: ( $( window ).height() - 32 ) / 3 + "px", // 32 = tinggi gambar
          display: "block"
        })
        $('#loader').addClass("add-loader");

        let route = "{{route('update-criteria')}}";
        let formData = $('#form-edit').serializeArray();
        let csrfToken = formData[0].value;

        let data = {};
        data.id = formData[1].value;
        data.name = formData[2].value;       

        $.ajax({
          headers: {
              'X-CSRF-Token': csrfToken
          },
          url: route,
          type: "POST",
          data: "data=" + JSON.stringify(data),
          dataType: "json",
          success: function(data) {
              $('#loader').removeClass("add-loader");
              $( "#ajax-wait" ).fadeOut();
              location.reload();

              $(document).ready(function() {
                swal("Success!", data.message, data.alert);
              });
          },
          error: function(data) {
              $('#loader').removeClass("add-loader");
              $( "#ajax-wait" ).fadeOut();
  
              $(document).ready(function() {
                swal("Error!", "Update Criteria Failed!", "error");
              });
          }
        });
    });

    $('.get-delete-button').on('click', function () {
        let idCriteria = $.parseJSON($(this).attr('data-button'));

        $('#delete').modal('show');
        $('.modal-title').empty();
        $('.modal-title').text('Delete Criteria');

        $('.input-body').empty();
        let body = '<span> Data will be permanently deleted, are you sure? </span>'
        + '<input class="form-control input-sm" type="hidden" value="'+idCriteria+'" id="criteriaID" name="criteriaID">'
        $('.input-body').append(body);      
    });

    $('#delete-button').on('click', function () {
        $( "#ajax-wait" ).css({
          left: ( $( window ).width() - 32 ) / 2 + "px", // 32 = lebar gambar
          top: ( $( window ).height() - 32 ) / 3 + "px", // 32 = tinggi gambar
          display: "block"
        })
        $('#loader').addClass("add-loader");

        let route = "{{route('delete-criteria')}}";
        let formData = $('#form-delete').serializeArray();
        let csrfToken = formData[0].value;

        let data = {};
        data.id = formData[1].value;        

        $.ajax({
          headers: {
              'X-CSRF-Token': csrfToken
          },
          url: route,
          type: "POST",
          data: "data=" + JSON.stringify(data),
          dataType: "json",
          success: function(data) {
              $('#loader').removeClass("add-loader");
              $( "#ajax-wait" ).fadeOut();
              location.reload();

              $(document).ready(function() {
                swal("Success!", data.message, data.alert);
              });
          },
          error: function(data) {
              $('#loader').removeClass("add-loader");
              $( "#ajax-wait" ).fadeOut();
  
              $(document).ready(function() {
                swal("Error!", "Delete Criteria Failed!", "error");
              });
          }
        });
    });

  });
</script>
@endsection