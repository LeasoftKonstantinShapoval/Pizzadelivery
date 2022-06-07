@include('layouts.head')
@include('layouts.adminheader')
    <!-- Контент -->
    <div class="container mb-5">
        <div class="row">
            <div class="table">
                <div class="admin_btn">
                    <h1>Закази</h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Склад заказу</th>
                            <th>До сплати</th>
                            <th>Тип оплати</th>
                            <th>Дата</th>
                            <th>Користувач</th>
                            <th>Адрес</th>
                            <th>Телефон</th>
                            <th>Принят</th>
                            <th>Доставлено</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $key => $order)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $order->product_ids }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>{{ $order->payment_type }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->user_name }}</td>
                                <td>{{ $order->address_delivery }}</td>
                                <td>{{ $order->phone_number }}</td>
                                <td>
                                    @if($order->accepted == 0)
                                    <form method="POST"
                                          action="{{ route('editOrder', ['order' => $order->id]) }}">
                                        @csrf
                                        <input type="hidden" id="submitAccept" name="submitAccept" value="1">
                                        <button class="btn btn-warning" type="submit">Прийняти</button>
                                    </form>
                                    @else <p style="color:green;">Прийнято</p>
                                    @endif
                                </td>
                                <td>
                                    @if($order->delivered == 0)
                                        <form method="POST"
                                              action="{{ route('editOrder', ['order' => $order->id]) }}">
                                            @csrf
                                            <input type="hidden" id="submitDelivery" name="submitDelivery" value="1">
                                            <button class="btn btn-warning"  type="submit">Доставлено</button>
                                        </form>
                                    @else <p style="color:green;">Доставлено</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Подвал -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body></html>
