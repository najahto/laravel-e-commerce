@extends('layouts.admin_layout.admin')

@section('pagetitle', 'Add Product - ' . config('app.name'))
    <!-- start content -->
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Product</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
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
                                <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ Route('products.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="productName">Product name</label>
                                        <input type="text" name="name" class="form-control" id="productName"
                                            placeholder="Enter product name">
                                    </div>
                                    <div class="form-group">
                                        <label for="productPrice">Product price</label>
                                        <input type="number" name="price" class="form-control" id="productPrice" step=".01"
                                            placeholder="Enter product price">
                                    </div>
                                    <div class="form-group">
                                        <label for="discount">Product discount (%)</label>
                                        <input id="discount" type="number" name="discount" min="0" max="100" step=".01"
                                            placeholder="Enter discount" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="productDescription">Product Description</label>
                                        <textarea placeholder="Enter Product Description" class="form-control"
                                            name="description" id="productDescription" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Product category</label>
                                        <select name="category" class="form-control select2" style="width: 100%;">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="exampleInputFile">Product image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                @include('admin.partials.error')
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Save</button>
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
