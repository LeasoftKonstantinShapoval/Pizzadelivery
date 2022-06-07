@include('layouts.head')
@include('layouts.adminheader')
<!-- Контент -->
<div class="container-sm">
        <form method="post" enctype="multipart/form-data" action="{{ route('editProduct', ['id' => $product->id]) }}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="img">
                                <label for="fname">Image</label><input type="file" id="myFile" name="photo">
                            </div>
                            <div class="name_item">
                                <label for="fname">Назва</label> <input type="text" name="productName"
                                                                        placeholder="Name"
                                                                        value="{{  $product->name ?? old('productName')}}">
                            </div>
                            <label for="fname">Категорія</label>
                            <select class="form-select" name="catName" >
                                <option value="1" {{ \App\Models\Categories::find($product->category_id)->name == 'Піца' ? 'selected' :'' }}>Піца</option>
                                <option value="2" {{ \App\Models\Categories::find($product->category_id)->name == 'Напій' ? 'selected' :'' }}>Напій</option>
                            </select>
                            <div class="name_item">
                                <label for="fname">Ціна</label>
                                <input type="text" name="price" placeholder="Price"
                                       value="{{  $product->price ?? old('price')}}">
                            </div>
                            <div class="name_item">
                                <label for="fname">Вага</label>
                                <input type="text" name="weight" placeholder="Weight"
                                       value="{{  $product->weight ?? old('weight')}}">
                            </div>
                            <div class="name_item">
                                <label for="fname">Склад</label>
                                <input type="text" name="sklad" placeholder="Compound"
                                       value="{{  $product->description ?? old('sklad')}}">
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
