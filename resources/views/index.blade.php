@include('layouts.head')
<!-- Шапка -->
@include('layouts.header')

<section class="home-menu">
    <div class="container">
        <!-- Swiper -->
        <div class="swiper-menu">
            <div class="swiper-wrapper">
                <a itemprop="url" data-nav="picca" href="#picca" class="swiper-slide active">Піца</a>
                <a itemprop="url" data-nav="napitki" href="#napitki" class="swiper-slide">Напої</a>
            </div>
        </div>
    </div>
</section>
<section class="home-banner">
    <div class="container">
        <!-- Swiper -->
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/slider12.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/slider13.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/slider15.png') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev"></button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
            </button>
        </div>
    </div>
</section>
<!-- Контент -->
<div class="container mb-5">
    <div class="row">
        <!-- Товары -->
        <div class="col-md-8">
            <div class="row">
                <!-- // линк Пицца -->
                <div class="nts-products__title" id="picca" data-section="picca">Піца</div>
                <!-- // Товари -->
                @if(!empty($pizzas))
                    @foreach($pizzas as $pizza)
                        <div class="col-md-6">
                            <div class="card mb-4" data-id="{{$pizza->id}}">
                                <img class="product-img" src="data:image/png;base64, {{$pizza->photo}}" alt="{{$pizza->name}}">
                                <div class="card-body text-center">
                                    <h4 class="item-title">{{$pizza->name}}</h4>
                                    <p><small data-items-in-box class="text-muted">{{ $pizza->description }}</small></p>

                                    <div class="details-wrapper">
                                        <div class="items counter-wrapper">
                                            <div class="items__control" data-action="minus">-</div>
                                            <div class="items__current" data-counter>1</div>
                                            <div class="items__control" data-action="plus">+</div>
                                        </div>

                                        <div class="price">
                                            <div class="price__weight">{{ $pizza->weight }} г.</div>
                                            <div class="price__currency">{{ $pizza->price }} ₴</div>
                                        </div>
                                    </div>

                                    <button data-cart type="button" class="btn btn-block btn-outline-warning">+ в
                                        кошик
                                    </button>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="nts-products__title" id="napitki" data-section="napitki">Напої</div>
                @if(!empty($drinks))
                    @foreach($drinks as $drink)
                        <div class="col-md-6">
                            <div class="card mb-4" data-id="{{$drink->id}}">
                                <img class="product-img" src="data:image/png;base64, {{$drink->photo}}" alt="{{$drink->name}}">
                                <div class="card-body text-center">
                                    <h4 class="item-title">{{$drink->name}}</h4>
                                    <p><small data-items-in-box class="text-muted">{{ $drink->description }}</small></p>

                                    <div class="details-wrapper">
                                        <div class="items counter-wrapper">
                                            <div class="items__control" data-action="minus">-</div>
                                            <div class="items__current" data-counter>1</div>
                                            <div class="items__control" data-action="plus">+</div>
                                        </div>

                                        <div class="price">
                                            <div class="price__weight">{{ $drink->weight }} л.</div>
                                            <div class="price__currency">{{ $drink->price }} ₴</div>
                                        </div>
                                    </div>

                                    <button data-cart type="button" class="btn btn-block btn-outline-warning">+ в
                                        кошик
                                    </button>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Корзина -->
        @include('layouts.cart')
        <!-- // Корзина -->
    </div>
</div>
<!-- Подвал -->
@include('layouts.footer')
