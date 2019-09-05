@extends('layouts.office.index')

@section('content')
    <div class="m-portlet m-portlet--tab">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide"> <i class="la la-gear"></i> </span>
                    <h3 class="m-portlet__head-text">
                        Form {{ $title }}
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form action="{{ route($controller.'.store') }}" method="post" class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data">
            {{ csrf_field() }}

            @include($view . '.field')
        </form>
        <!--end::Form-->
    </div>
@endsection