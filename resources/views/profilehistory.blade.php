@include('layouts.head')
@include('layouts.header')
<!-- Контент -->
<div class="container mb-5 profile">
    <div class="row">

        <!-- Профіль -->
        <div class="container container-big">
            <div class="row row-60">
                <div class="col-xl-4">
                    <div class="cabinet-menu">
                        <ul class="cabinet-list">
                            <li class="cabinet-list-item active"><a href="{{ route('profile') }}">Особисті дані</a></li>
                            <li class="cabinet-list-item "><a href="{{ route('showUserOrders', ['user_id' => Auth::user()->id]) }}">Історія замовлень</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-10 history">
                    <div class="nts-products__title">Історія замовлень</div>
                    <div class="table-responsive">
                        <table class="table history_order">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Номер заказу</th>
                                <th>До сплати</th>
                                <th>Тип оплати</th>
                                <th>Дата</th>
                                <th>Адрес</th>
                                <th>Телефон</th>
                                <th>Прийнятий</th>
                                <th>Доставлений</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $order)
                            <tr>
                                <td><a href="{{ route('showUserOrder', ['id' => $order->id]) }}">{{ $key }}</a></td>
                                <td><a href="{{ route('showUserOrder', ['id' => $order->id]) }}">{{ $order->id }}</a></td>
                                <td><a href="{{ route('showUserOrder', ['id' => $order->id]) }}">{{ $order->total_price }}₴</a></td>
                                <td><a href="{{ route('showUserOrder', ['id' => $order->id]) }}">{{ $order->payment_type }}</a></td>
                                <td><a href="{{ route('showUserOrder', ['id' => $order->id]) }}">{{ $order->created_at }}</a></td>
                                <td><a href="{{ route('showUserOrder', ['id' => $order->id]) }}">{{ $order->address_delivery }}</a></td>
                                <td><a href="{{ route('showUserOrder', ['id' => $order->id]) }}">{{ $order->phone_number }}</a></td>
                                @if($order->accepted == 0)
                                    <th><p style="color:orange;">Не прийнято</p></th>
                                @else <th><p style="color:green;">Прийнято</p></th>
                                @endif
                                @if($order->delivered == 0)
                                    <th><p style="color:orange;">Не доставлено</p></th>
                                @else <th><p style="color:green;">Доставлено</p></th>
                                @endif

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@include('layouts.footer')
