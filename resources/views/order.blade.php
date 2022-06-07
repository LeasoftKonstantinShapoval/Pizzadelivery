@include('layouts.head')
@include('layouts.header')
    <!-- Контент -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-8">
                <div class="row" id="products-container">
                    <div class="cart_order">
                        <div class="col">
                            <div class="card-body">
                                <h4 class="card-title">Ваше замовлення</h4>

                                    <!-- cart-wrapper -->
                                    <div class="cart-wrapper">
                                        @foreach($products as $product)

                                        <div class="cart-item" data-id="{{$product->id}}">
                                            <div class="cart-item__top">
                                                <div class="cart-item__img">
                                                    <img class="product-img" src="data:image/png;base64, {{$product->photo}}" alt="{{$product->name}}">
                                                </div>
                                                <div class="cart-item__desc">
                                                    <div class="cart-item__title">{{$product->name}}</div>
                                                    <div class="cart-item__weight">{{$product->weight}} г.</div>

                                                    <!-- cart-item__details -->
                                                    <div class="cart-item__details">

                                                        <div class="items items--small counter-wrapper">
                                                            <div class="items__control" data-action="minus">-</div>
                                                            <div class="items__current" data-counter="">{{$product->count}}</div>
                                                            <div class="items__control" data-action="plus">+</div>
                                                        </div>

                                                        <div class="price">
                                                            <div class="price__currency">{{$product->price}} ₴</div>
                                                        </div>

                                                    </div>
                                                    <!-- // cart-item__details -->

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                    <!-- // cart-wrapper -->

                                    <!-- Стоимость заказа -->
                                    <div class="cart-total">
                                        <p><span class="h5">Доставка:</span> <span class="delivery-cost free">бесплатно</span> </p>
                                        <p><span class="h5">Итого:</span> <span class="total-price">{{$order->total_price}}</span> <span class="rouble"> ₴</span></p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Корзина -->
            <div class="col-md-4">
                <h3 class="order">Замовлення № {{$order->id}}</h3>
                <span></span>
                <form action="/action_page.php" class="was-validated">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Им'я:</label>
                        <input type="text" class="form-control" id="uname" placeholder="{{$order->user_name}}" name="name" required disabled >
                    </div>
                    <div class="mb-3">
                        <label for="phn" class="form-label">Номер телефону:</label>
                        <input type="phone" class="form-control" id="pwd" placeholder="{{$order->phone_number}}" name="phn" required disabled >
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Адреса:</label>
                        <input type="text" class="form-control" id="uname" placeholder="{{$order->address_delivery}}" name="adr" required disabled >
                    </div>
                    <select class="form-select" disabled >
                        <option>{{$order->payment_type}}</option>
                    </select>
                </form>

                <div class="card mb-4">
                </div>

                <div class=""><h4>Очікуйте на дзвінок оператора.</h4></div>

            </div>
            <!-- // Корзина -->
        </div>
    </div>
@include('layouts.footer')
