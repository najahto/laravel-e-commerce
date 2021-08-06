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
                                <h6 class="m-0 font-weight-bold text-primary float-left">Product Lists</h6>
                                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-toggle="tooltip" data-placement="bottom" title="Add User"><i
                                        class="fas fa-plus"></i> Add Product</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (count($products) > 0)
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID.</th>
                                                <th>Picture</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>
                                                        @if ($product->image_url)
                                                            <img src="{{ asset('storage/' . $product->image_url) }}"
                                                                style="height : 50px; width : 50px"
                                                                class="img-circle elevation-2" alt="Product Image">
                                                        @else
                                                            <img src="{{ asset('backend/img/no_image_placeholder.jpg') }}"
                                                                style="height : 50px; width : 50px"
                                                                alt="no image availibale">
                                                        @endif

                                                    </td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->discount }}% OFF</td>
                                                    <td>{{ $product->category->name }}</td>
                                                    <td>{{ Str::limit($product->description, 10, '...') }}</td>
                                                    <td>
                                                        @if ($product->status == 1)
                                                            <a href="{{ route('inactivate.product', $product->id) }}"
                                                                class="btn btn-warning">Inactivate</a>
                                                        @else
                                                            <a href="{{ route('activate.product', $product->id) }}"
                                                                class="btn btn-success">Activate</a>
                                                        @endif
                                                        <a href="{{ route('products.edit', $product->id) }}"
                                                            class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                                        <form action="{{ route('products.destroy', $product->id) }}"
                                                            method="POST" style="display: inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('products.destroy', $product->id) }}"
                                                                class="btn btn-danger btn-delete-resource redirect-after-confirmation"
                                                                data-confirmation-message="Are you sure you want to delete?"><i
                                                                    class=" nav-icon fas fa-trash"></i></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Num.</th>
                                                <th>Picture</th>
                                                <th>Product Name</th>
                                                <th>Product Price</th>
                                                <th>Product Category</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <div class="d-flex">
                                        <div class="mx-auto">
                                            {!! $products->links() !!}
                                        </div>
                                    </div>

                                @else
                                    <p>
                                    <h5 style="color:#F00;">No data</h5>
                                    </p>
                                @endif

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
