@extends('layouts.admin_layout.admin')

@section('pagetitle', 'Sliders - ' . config('app.name'))
    <!-- start content -->
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Sliders</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Sliders</li>
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
                                <h6 class="m-0 font-weight-bold text-primary float-left">Slider Lists</h6>
                                <a href="{{ route('sliders.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-toggle="tooltip" data-placement="bottom" title="Add User"><i
                                        class="fas fa-plus"></i> Add Slider</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (count($sliders) > 0)
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Num.</th>
                                                <th>Picture</th>
                                                <th>Description one</th>
                                                <th>Description Two</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sliders as $slider)
                                                <tr>
                                                    <td>{{ $slider->id }}</td>
                                                    <td>
                                                        @if ($slider->image_url)
                                                            <img src="{{ asset('storage/' . $slider->image_url) }}"
                                                                style="height : 50px; width : 50px"
                                                                class="img-circle elevation-2" alt="Slider Image">
                                                        @else
                                                            <img src="{{ asset('backend/img/no_image_placeholder.jpg') }}"
                                                                style="height : 50px; width : 50px"
                                                                alt="no image availibale">
                                                        @endif
                                                    </td>
                                                    <td>{{ $slider->description1 }}
                                                    </td>
                                                    <td>{{ $slider->description2 }}</td>
                                                    <td>
                                                        @if ($slider->status == 1)
                                                            <a href="{{ route('inactivate.slider', $slider->id) }}"
                                                                class="btn btn-warning">Inactivate</a>
                                                        @else
                                                            <a href="{{ route('activate.slider', $slider->id) }}"
                                                                class="btn btn-success">Activate</a>
                                                        @endif
                                                        <a href="{{ route('sliders.edit', $slider->id) }}"
                                                            class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                                        <form action="{{ route('sliders.destroy', $slider->id) }}"
                                                            method="POST" style="display: inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('sliders.destroy', $slider->id) }}"
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
                                                <th>Description one</th>
                                                <th>Description Two</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    {!! $sliders->links() !!}
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
