@extends('layouts.admin_layout.admin')

@section('pagetitle', 'Edit Area - ' . config('app.name'))
<!-- start content -->
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Area</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Area</li>
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
                                <h6 class="m-0 font-weight-bold text-primary">Edit Area</h6>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ Route('areas.update', $area->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Area name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $area->name }}"
                                            placeholder="Enter Area">
                                    </div>
                                    <div class="form-group">
                                        <label>Area Sector</label>
                                        <select name="sector" class="form-control select2" style="width: 100%;">
                                            @foreach ($sectors as $sector)
                                                <option
                                                    {{ old('sector', $area->sector_id) == $sector->id ? 'selected' : '' }}
                                                    value="{{ $sector->id }}">{{ $sector->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
