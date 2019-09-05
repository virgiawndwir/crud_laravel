<div class="m-portlet__body">
    <div class="form-group m-form__group">
        <div class="row">
            <div class="col-md-6">
                <label>Nama</label>
                <input type="text" name="name" class="form-control m-input m-input--square" value="{{ @$data->name }}">
            </div>

            <div class="col-md-6">
                <label>Harga</label>
                <input type="text" name="price" class="form-control m-input m-input--square" value="{{ @$data->price }}">
            </div>
        </div>
    </div>

    <div class="form-group m-form__group">
        <div class="row">
            <div class="col-md-6">
                <label>Kategori</label>
                <input name="category" type="text" class="form-control m-input m-input--square" value="{{ @$data->category }}">
            </div>

            <div class="col-md-6">
                <label>Foto</label>
                <input type="file" name="image" class="form-control m-input m-input--square" value="{{ @$data->image }}">
            </div>
        </div>
    </div>
    <div class="form-group m-form__group">
        <div class="row">
            <div class="col-md-6">
                <label>Stok</label>
                <input name="stock" type="text" class="form-control m-input m-input--square" value="{{ @$data->stock }}">
            </div>
        </div>
    </div>
</div>

<div class="m-portlet__foot m-portlet__foot--fit">
    <div class="m-form__actions m-form__actions--solid">
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route($controller . '.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</div>
