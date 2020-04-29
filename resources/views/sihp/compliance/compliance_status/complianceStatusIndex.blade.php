@extends('sihp.master')
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Compliance Status</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header">
                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> New Status</button>
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
                <tr>
                  <td>Trident</td>
                  <td>InternetExplorer 4.0</td>
                  <td>X</td>
                </tr>
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