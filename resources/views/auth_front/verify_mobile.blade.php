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
                <form action="{{ route('verified.mobile') }}" method="post">
                    @csrf

                    <div class="mb-3 mt-3">
                        <label for="mobile" class="form-label">موبایل</label>
                        <input type="text" class="@error('mobile') is_invalid @enderror form-control"
                               dir="ltr"
                               id="mobile"
                               name="mobile" value="{{ old('mobile') }}">
                    </div>
                    @error('mobile')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3 mt-3">
                        <label for="token" class="form-label">کد فعال سازی</label>
                        <input type="text" class="@error('token') is_invalid @enderror form-control"
                               id="token" dir="ltr"
                               name="token" value="{{ old('token') }}">
                    </div>
                    @error('token')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-check mb-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> منو فراموش نکن !
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-success  btn-register rounded-3">ورود</button>

                    <a href="{{ route('login.form') }}" class="btn btn-light">ارسال مجدد کد فعال سازی</a>
                </form>
            </div>


        </div>


    </div>
@endsection



