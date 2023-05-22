@extends('include_front.master')
@section('title_front')
    ثبت نام
@endsection
@section('main_content_front')
    <div class="register-section">

        <div class="alert-section mt-2">
            @include('include_front.alert')
        </div>

        <div class="row d-flex justify-content-center mb-5 mt-2">



            <div class="col-xl-6 col-lg-6 col-md-6   border border-2  rounded-3 py-4 px-4 register-form">
                <form action="{{ route('register') }}" method="post">
                    @csrf



                    <div class="mb-3 mt-3">
                        <label for="mobile" class="form-label">موبایل</label>
                        <input type="text" class="@error('mobile') is_invalid @enderror form-control" dir="ltr" id="mobile"
                               name="mobile" value="{{ old('mobile') }}">
                    </div>
                    @error('mobile')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3 mt-3">
                        <label for="token" class="form-label">کد فعال سازی</label>
                        <input type="text" class="@error('token') is_invalid @enderror form-control" id="token"
                               name="token" value="{{ old('email') }}">
                    </div>
                    @error('token')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <button type="submit" class="btn btn-success  btn-register rounded-3">تایید کد</button>
                </form>
            </div>


        </div>


    </div>
@endsection



