@extends('layouts.admin_layout.admin')

@section('pagetitle', 'Add Category - ' . config('app.name'))
<!-- start content -->
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h2>Category</h2>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">Category</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                      <!-- jquery validation -->
                      <div class="card card-primary">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                        </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form>
                              <div class="card-body">
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Category name</label>
                                      <input type="text" name="category_name" class="form-control"
                                          id="exampleInputEmail1" placeholder="Enter category">
                                  </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                  <input type="submit" class="btn btn-primary" value="Save">
                              </div>
                          </form>
                      </div>
                      <!-- /.card -->
                  </div>
                  <!--/.col (left) -->
                  <!-- right column -->
                  <div class="col-md-6">

                  </div>
                  <!--/.col (right) -->
              </div>
              <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection