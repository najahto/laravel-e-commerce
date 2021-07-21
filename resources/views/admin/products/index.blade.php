@extends('layouts.admin_layout.admin')

@section('pagetitle', 'Products - ' . config('app.name'))
    <!-- start content -->
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Products</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Num.</th>
                                            <th>Picture</th>
                                            <th>Product Name</th>
                                            <th>Product Category</th>
                                            <th>Product Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img src="../../dist/img/user2-160x160.jpg"
                                                    style="height : 50px; width : 50px" class="img-circle elevation-2"
                                                    alt="User Image">
                                            </td>
                                            <td>Win 95+</td>
                                            <td> 4</td>
                                            <td>5</td>
                                            <td>
                                                <a href="#" class="btn btn-success">Unactivate</a>
                                                <a href="#" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                                <a href="#" id="delete" class="btn btn-danger"><i
                                                        class="nav-icon fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <img src="../../dist/img/user2-160x160.jpg"
                                                    style="height : 50px; width : 50px" class="img-circle elevation-2"
                                                    alt="User Image">
                                            </td>
                                            <td>Win 95+</td>
                                            <td>5</td>
                                            <td>5</td>
                                            <td>
                                                <a href="#" class="btn btn-warning">Activate</a>
                                                <a href="#" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                                <a href="#" id="delete" class="btn btn-danger"><i
                                                        class="nav-icon fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Num.</th>
                                            <th>Picture</th>
                                            <th>Product Name</th>
                                            <th>Product Category</th>
                                            <th>Product Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
<!-- /.content-wrapper -->
