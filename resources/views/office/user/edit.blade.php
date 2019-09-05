@extends('layouts.office.index')

@section('content')
    <div class="m-portlet m-portlet--tab">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide"> <i class="la la-gear"></i> </span>
                    <h3 class="m-portlet__head-text">
                        Ubah {{ $title }}
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form action="{{ route($controller . '.update',['id' => $data->id]) }}" method="post" class="m-form m-form--fit m-form--label-align-right">
            @csrf
            {{ method_field('PUT')}}

            @include($view . '.field')
        </form>
        <!--end::Form-->
    </div>
@endsection
