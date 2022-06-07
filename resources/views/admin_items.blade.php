@include('layouts.head')
@include('layouts.adminheader')
    <!-- Контент -->
    <div class="container mb-5">
        <div class="row">
            <div class="table">
                <div class="admin_btn">
                    <h1>Товари</h1>
                    <a href="{{ route('createProduct') }}" class="admin_btn"><span>Додати товар</span></a>
                </div>
                @if(session('flesh'))
                    <div class="alert alert-success">
                        {{ session('flesh') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ProductID</th>
                                <th>Им'я</th>
                                <th>Категорія</th>
                                <th>Ціна</th>
                                <th>Вага</th>
                                <th>Дата</th>
                                <th>Редагувати</th>
                                <th>Видалити</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(!empty($products))
                            @foreach($products as $key => $product)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->weight}}</td>
                                <td>{{$product->created_at}}</td>
                                <td><button  type="button" class="btn btn-warning" onclick="window.location.href='{{ route('editProduct', ['id' => $product->id]) }}';">Редагувати</button></td>
                                <td>
                                    <form method="POST" action="{{ route('deleteProduct', ['product' => $product->id]) }}" enctype="multipart/form-data">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Видалити</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Подвал -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body></html>
