<div class="m-portlet__body">
    <div class="form-group m-form__group">
        <div class="row">
            <div class="col-md-6">
                <label>Nama</label>
                <input type="text" name="name" class="form-control m-input m-input--square" value="{{ @$data->name }}">
            </div>
            
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control m-input m-input--square" value="{{ @$data->email }}">
            </div>
        </div>
    </div>

    <div class="form-group m-form__group">
        <div class="row">
            <div class="col-md-6">
                <label>Katasandi</label>
                <input type="password" name="password" class="form-control m-input m-input--square">
            </div>
            
            <div class="col-md-6">
                <label>Konfirmasi Katasandi</label>
                <input type="password" name="password_confirm" class="form-control m-input m-input--square">
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
