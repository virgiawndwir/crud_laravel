@extends('layouts.office.index')

@section('content')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Data {{ $title }}
                </h3>
            </div>
        </div>
    </div>

    <div class="m-portlet__body">
        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <div class="m-separator m-separator--dashed d-xl-none"></div>

                </div>
            </div>
        </div>
        
        @foreach($datas as $data)
        <div class="m_datatable m-datatable m-datatable--default m-datatable--brand m-datatable--error m-datatable--loaded">
            <table class="table table-bordered table-hover" id="datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Detail</th>
                    </tr>
                </thead>

                <tbody>
                    @include('layouts.office.empty-data', [$datas, $title, 'colspan' => 4])
                    
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->id }}</td>                        
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->detail }}</td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach
    </div>
</div>
@endsection