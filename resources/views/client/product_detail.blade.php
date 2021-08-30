@extends('layouts.client_layout.client')

@section('pagetitle', 'Product Detail - ' . config('app.name'))
    <!-- start content -->
@section('content')

    <div class="hero-wrap hero-bread" style="background-image:url('{{ asset('frontend/images/bg_1.jpg') }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a
                                href="index.html">Product</a></span> <span>Product Single</span></p>
                    <h1 class="mb-0 bread">Product Single</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <img class="img-fluid" src="{{ asset('storage/' . $productDetail->image_url) }}"
                        alt="Colorlib Template">
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $productDetail->name }}</h3>
                    @php
                        $after_discount = $productDetail->price - ($productDetail->price * $productDetail->discount) / 100;
                    @endphp
                    <p class="price"><span>${{ number_format($after_discount, 2) }}</span></p>
                    <p>
                        {{ $productDetail->description }}
                    </p>
                    <div class="row mt-4">
                        <div class="w-100"></div>


                        <p style="margin-top: 30px;"><a href="{{ route('add-to-cart', $productDetail->id) }}"
                                class="btn btn-black py-3 px-5">Add to Cart</a></p>
                    </div>
                </div>
            </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Products</span>
                    <h2 class="mb-4">Related Products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($relartedProducts as $product)
                    @include('client.partials.product_card')
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('styles')

@endpush

@push('scripts')

    <script>
        $(document).ready(function() {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

@endpush
