<div class="col-md-6 col-lg-3 ftco-animate">
    <div class="product">
        <a href="{{ route('product-detail', $product->id) }}" class="img-prod"><img class="img-fluid"
                src="{{ asset('storage/' . $product->image_url) }}" alt="Colorlib Template">
            @if ($product->discount > 0)
                <span class="status">
                    {{ $product->discount }}%
                </span>
            @endif
            <div class="overlay"></div>
        </a>
        <div class="text py-3 pb-4 px-3 text-center">
            <h3><a href="{{ route('product-detail', $product->id) }}">{{ $product->name }}</a></h3>
            <div class="d-flex">
                <div class="pricing">
                    <p class="price">
                        @if ($product->discount > 0)
                            <span class="mr-2 price-dc">${{ number_format($product->price, 2) }}</span>
                            <span class="price-sale">
                                @php
                                    $after_discount = $product->price - ($product->price * $product->discount) / 100;
                                @endphp
                                ${{ number_format($after_discount, 2) }}
                            </span>
                        @else
                            <span class="price-sale">${{ number_format($product->price, 2) }}</span>
                        @endif
                    </p>
                </div>
            </div>
            <div class="bottom-area d-flex px-3">
                <div class="m-auto d-flex">
                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                        <span><i class="ion-ios-heart"></i></span>
                    </a>

                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                        <span><i class="ion-ios-cart"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
