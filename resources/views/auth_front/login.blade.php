@extends('include_front.master')
@section('title_front')
    ورود
@endsection
@section('main_content_front')
    <div class="login-section">

        <div class="alert-section mt-2">
            @include('include_front.alert')
        </div>

        <div class="row d-flex  justify-content-center mb-5 mt-2">


            <div class="col-xl-6 col-lg-6 col-md-6  border border-2  rounded-3 py-4 px-4 login-form">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="mobile" class="form-label">موبایل</label>
                        <input type="text" class="@error('mobile') is-invalid @enderror form-control" id="mobile"
                               name="mobile">
                    </div>
                    @error('mobile')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <button type="submit" class="btn btn-success btn-login rounded-3">ادامه</button>
                </form>
            </div>


        </div>


    </div>
@endsection

