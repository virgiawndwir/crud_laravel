<div class="m-portlet__body">
    <div class="form-group m-form__group">
        <div class="row">
            <div class="col-md-4">
                <label>Nama</label>
                <input type="text" name="name" class="form-control m-input m-input--square" value="{{ @$data->name }}">
            </div>

            <div class="col-md-4">
                <label>Detail</label>
                <input type="text" name="detail" class="form-control m-input m-input--square" value="{{ @$data->detail }}">
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
