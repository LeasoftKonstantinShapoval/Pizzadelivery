<div class="col-md-4">
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">Ваше замовлення</h4>
            @csrf

            <div data-cart-empty class="alert alert-secondary" role="alert">
                Кошик порожній
            </div>

            <!-- cart-wrapper -->
            <div class="cart-wrapper">
                <div class="row" id="products-container">

                </div>
            </div>
            <!-- // cart-wrapper -->

            <!-- Стоимость заказа -->
            <div class="cart-total">
                <p data-cart-delivery class="none">
                    <span class="h5">Доставка:</span>
                    <span class="delivery-cost">50 ₴</span><br>
                    <span class="small">Безкоштовна при замовленні від 399 ₴</span>
                </p>
                <p><span class="h5">Загальна сума:</span>
                    <span class="total-price" id="totalPrice">0</span>
                    <span class="rouble">₴</span>
                </p>
            </div>
            <!-- // Стоимость заказа -->
            <div id="order-form" class="card-body border-top none">
                @if(Route::is('index'))
                <h5 class="card-title">Оформити замовлення</h5>
                <a href="{{ route('createOrder') }}" class="btn btn-primary">Замовити</a>
                @endif
            </div>
        </div>
    </div>
</div>
