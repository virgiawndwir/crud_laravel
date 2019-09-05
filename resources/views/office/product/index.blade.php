@extends('layouts.office.index')

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Daftar {{ $title }}
                    </h3>
                </div>
            </div>
        </div>
        
        <div class="m-portlet__body">  
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <form action="{{ route($controller . '.index') }}" method="get">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-4">
                                    <div class="m-input-icon m-input-icon--left">
                                        <input class="btn bg-secondary btn-sm col-md-12" id="hide" type="button" value="Activate form search">
                                        <input id="show" type="text" name="search" class="form-control m-input" placeholder="Search..." id="generalSearch" value="{{ $search }}">
                                        <span id="show2" class="m-input-icon__icon m-input-icon__icon--left">
                                            <span>
                                                <i class="la la-search"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <span>
                                    <button class="btn btn-success btn-sm" type="submit">Cari</button>
                                    <a href="{{ route($controller. '.index') }}" class="btn btn-sm btn-primary ">Refresh</a>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                        <a href="{{ route($controller. '.create') }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-plus"></i>
                                <span>
                                    Tambah {{ $title }}
                                </span>
                            </span>
                        </a>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>

            <div class="m_datatable m-datatable m-datatable--default m-datatable--brand m-datatable--error m-datatable--loaded">
                <table class="table table-bordered table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Detail</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @include('layouts.office.empty-data', [$datas, $title, 'colspan' => 4])
                        
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->id }}</td>                        
                                <td>{{ $data->name }}</td>                        
                                <td>{{ $data->detail }}</td>
                                
                        @include($view. '.action')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $datas->links() }}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
            $(document).ready(function(){
                $('#hide').click(function(){
                    $('#show').toggle();
                    $('#show2').toggle();
                    $('#hide').toggle();
                });
            });
    </script>

    <style>
        #show,#show2{
            display: none;
        }
    </style>
@endsection
