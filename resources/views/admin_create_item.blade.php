@include('layouts.head')
@include('layouts.adminheader')
<!-- Контент -->
<div class="container-sm">
                <form method="post" enctype="multipart/form-data" action="{{ route('createProduct') }}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="img">
                                <label for="fname">Image</label><input type="file" id="myFile" name="photo">
                            </div>
                            <div class="name_item">
                                <label for="fname">Назва</label> <input type="text" name="productName" placeholder="Name">
                            </div>
                            <label for="fname">Категорія</label>
                            <select class="form-select" name="catName">
                                <option value="1">Піца</option>
                                <option value="2">Напій</option>
                            </select>
                            <div class="name_item">
                                <label for="fname">Ціна</label>
                                <input type="text" name="price" placeholder="Price">
                            </div>
                            <div class="name_item">
                                <label for="fname">Вага</label>
                                <input type="text" name="weight" placeholder="Weight">
                            </div>
                            <div class="name_item">
                                <label for="fname">Склад</label>
                                <input type="text" name="sklad" placeholder="Compound">
                            </div>
                            <input type="submit" name="Додати">
                        </div>
                    </div>
            </form>
        </form>
</div>
<!-- Подвал -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body></html>
