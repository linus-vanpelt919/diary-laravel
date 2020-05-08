@extends('layouts.app')

@section('content')

    <!-- ヘッダ- コンポーネント化する -->
    <header-component></header-component>
    <!-- ヘッダ- コンポーネント化する -->

    <main class="l-main l-main--base">
        <div class="l-main__inner">
            <div class="p-form__container">
                <h2 class="p-form__title">{{ __('Reset Password') }}</h2>
                <div class="c-form__container">
                    <form method="POST" action="{{ route('password.email') }}" class="c-form c-form--contact">
                        @csrf

                        <label for="email" class="c-form__label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}"
                               required autocomplete="email" autofocus>
                        @error('email')
                        <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror


                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>


                    </form>
                </div>
            </div>
        </div>
    </main>


    <!--フッター -->
    <footer-component></footer-component>
    <!--フッター -->

@endsection
