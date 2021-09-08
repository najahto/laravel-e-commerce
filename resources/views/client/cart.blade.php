@extends('layouts.client_layout.client')

@section('pagetitle', 'Cart - ' . config('app.name'))
<!-- start content -->
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span>
                        <span>Cart</span>
                    </p>
                    <h1 class="mb-0 bread">My Cart</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @if (Session::has('cart'))
                                    @foreach ($products as $product)
                                        <tr class="text-center">

                                            <td class="product-remove"><a
                                                    href="{{ route('remove-from-cart', $product['product_id']) }}"><span
                                                        class="ion-ios-close"></span></a>
                                            </td>

                                            <td class="image-prod">
                                                <div class="img"
                                                    style="background-image:url({{ asset('storage/' . $product['product_image']) }});">
                                                </div>
                                            </td>

                                            <td class="product-name">
                                                <h3>{{ $product['product_name'] }}</h3>
                                            </td>

                                            <td class="price">
                                                @if ($product['product_discount'] > 0)
                                                    <span class="mr-2 price-dc"><del>${{ number_format($product['product_price'], 2) }}
                                                        </del></span>
                                                    <span class="price-sale">
                                                        @php
                                                            $after_discount = $product['product_price'] - ($product['product_price'] * $product['product_discount']) / 100;
                                                        @endphp
                                                        ${{ number_format($after_discount, 2) }}

                                                    </span>
                                                @else
                                                    <span class="price-sale">
                                                        ${{ number_format($product['product_price'], 2) }}
                                                    </span>
                                                @endif
                                            </td>
                                            <form action="{{ route('update-quantity', $product['product_id']) }}"
                                                method="POST">
                                                @csrf
                                                <td class="quantity">
                                                    <div class="input-group mb-3">
                                                        <input type="number" name="quantity"
                                                            class="quantity form-control input-number"
                                                            value="{{ $product['qty'] }}" min="1" max="100">
                                                    </div>
                                                    <input type="submit" class="btn btn-success" value="validate">
                                                </td>
                                            </form>

                                            <td class="total">
                                                @if ($product['product_discount'] > 0)
                                                    @php
                                                        $total = $product['qty'] * $after_discount;
                                                    @endphp
                                                    ${{ number_format($total, 2) }}
                                                    @php
                                                        $totalPrice = $totalPrice + $total;
                                                    @endphp
                                                @else
                                                    @php
                                                        $total = $product['qty'] * $product['product_price'];
                                                    @endphp
                                                    ${{ number_format($total, 2) }}
                                                    @php
                                                        $totalPrice = $totalPrice + $total;
                                                    @endphp
                                                @endif
                                            </td>
                                        </tr><!-- END TR-->
                                    @endforeach

                                @else
                                    <h2> the cart is empty try to add products</h2>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Estimate shipping </h3>
                        <p>Enter your destination to get a shipping estimate</p>
                        <div class="form-group">
                            <label for="area">Delivery sectors and areas</label>
                            <select name="area" class="js-example-basic-single form-control"
                                onchange="displayDelivryPrice(this.value)" id="">
                                @foreach ($sectors as $sector)
                                    <option disabled selected value> -- select an area -- </option>
                                    <optgroup label="{{ $sector->name }} &nbsp;-&nbsp;${{ $sector->price }}">
                                    </optgroup>
                                    @foreach ($sector->areas as $area)
                                        <option value="{{ $sector->price }}">{{ $area->name }} </option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>${{ number_format($totalPrice, 2) }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span id="delivryPrice">$0.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>${{ number_format($totalPrice, 2) }}</span>
                        </p>
                    </div>
                    <p><a href="{{ url('/checkout') }}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                </div>
            </div>
        </div>
    </section>

@endsection
<!-- end content -->

@push('styles')
    <style>
        /* Page Specific Custom Style Here */
        .select2-selection__rendered {
            line-height: 52px !important;
        }

        .select2-container .select2-selection--single {
            height: 52px !important;
        }

        .select2-selection__arrow {
            height: 52px !important;
        }

    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        function displayDelivryPrice(value) {
            var priceSpan = document.getElementById("delivryPrice");
            priceSpan.textContent = '$' + value;
            console.log('the name is :' + value);
        }
    </script>
@endpush
