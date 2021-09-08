@extends('layouts.admin_layout.admin')

@section('pagetitle', 'Areas - ' . config('app.name'))
<!-- start content -->
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Areas</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Areas</li>
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
                                <h6 class="m-0 font-weight-bold text-primary float-left">Area Lists</h6>
                                <a href="{{ route('areas.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-toggle="tooltip" data-placement="bottom" title="Add User"><i
                                        class="fas fa-plus"></i> Add Area</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (count($areas) > 0)
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Num.</th>
                                                <th>Area Name</th>
                                                <th>Area Sector</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($areas as $area)
                                                <tr>
                                                    <td>{{ $area->id }}</td>
                                                    <td>{{ $area->name }}</td>
                                                    <td>{{ $area->sector->name }}</td>
                                                    <td>
                                                        <a href="{{ route('areas.edit', $area->id) }}"
                                                            class="btn btn-primary"><i class="nav-icon fas fa-edit"></i>
                                                        </a>
                                                        <form style="display: inline"
                                                            action="{{ route('areas.destroy', $area->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('areas.destroy', $area->id) }}"
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
                                                <th>Area Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <div class="d-flex">
                                        <div class="mx-auto">
                                            {!! $areas->links() !!}
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
@push('styles')
    <style>
        /* Page Specific Custom Style Here */

    </style>
@endpush

@push('scripts')
    <script>
        /* Page Specific Custom Script Here */
    </script>
@endpush
