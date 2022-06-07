@include('layouts.head')
@include('layouts.adminheader')

    <!-- Контент -->
    <div class="container mb-5">
        <div class="row">
            <div class="table">
                <div class="admin_btn">
                    <h1>Користувачі</h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Пошта</th>
                                <th>Телефон</th>
                                <th>Адреса</th>
                                <th>Бонуси</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phoneNumber }}</td>
                                <td>{{ $user->addressDelivery }}</td>
                                <td>{{ $user->bonus }}</td>
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

</body>

</html>
