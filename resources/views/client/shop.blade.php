@extends('layouts.client_layout.client')

@section('pagetitle', 'Shop - ' . config('app.name'))
    <!-- start content -->
@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
                        <span>Products</span>
                    </p>
                    <h1 class="mb-0 bread">Products</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        {{-- <li class="nav-item"><a class="nav-link " href="*" role="tab" aria-selected="true">All</a></li> --}}
                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link " id="{{ $category->name }}-tab" data-toggle="tab"
                                    href="#{{ $category->name }}" role="tab" aria-controls="{{ $category->name }}"
                                    aria-selected="false">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="tab-content">
                        @foreach ($categories as $category)
                            <div class="tab-pane fade @if (strcmp(strtoupper($category->nom), 'FRUIT')
                                == 0) show active @endif" id="{{ $category->name }}"
                                role="tabpanel"
                                aria-labelledby="{{ $category->name }}-tab">
                                <div class="row">
                                    @foreach ($category->products as $product)
                                        @include('client.partials.product_card')
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </section>

@endsection

@push('styles')
    <style>
        /* Page Specific Custom Style Here */
        .nav-tabs .nav-link {
            color: #000000;
            border: 0;
            /* border-bottom: 1px solid grey; */
        }

        .nav-tabs .nav-link:hover {
            border: 0;
            border-bottom: 3px solid grey;
        }

        .nav-tabs .nav-link.active {
            color: #82ae46;
            border: 0;
            border-radius: 0;
            border-bottom: 3px solid #82ae46;
        }

    </style>
@endpush

@push('scripts')
    <script>
        /* Page Specific Custom Script Here */
    </script>
@endpush
