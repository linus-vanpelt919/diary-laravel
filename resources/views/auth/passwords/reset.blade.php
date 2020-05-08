@extends('layouts.app')

@section('content')

    <!-- ヘッダ- コンポーネント化する -->
    <header-component></header-component>
    <!-- ヘッダ- コンポーネント化する -->

    <main class="l-main l-main--base">
        <div class="l-main__inner">
            <div class="p-form__container">
                <h2 class="p-form__title">{{ __('Register') }}</h2>
                <div class="c-form__container">
                    <form method="POST" action="{{ route('register') }}" class="c-form c-form--contact">
                        @csrf
                        <label for="name" class="c-form__label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control
                            @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror


                        <label for="email" class="c-form__label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}"
                               required autocomplete="email" autofocus>
                        @error('email')
                        <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                        <label for="password" class="c-form__label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="
                                        @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <label for="password-confirm" class="c-form__label">{{ __('Confirm Password') }}</label>

                        <input id="password-confirm" type="password" class=""
                               name="password_confirmation" required autocomplete="new-password">

                        <button type="submit" class="">
                            {{ __('Register') }}
                        </button>

                        <input class="form-check-input" type="checkbox"
                               name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>


                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </main>


    <!-- -->

                <div class="">{{ __('Reset Password') }}</div>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">



                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>

                    </form>


    <!--フッター -->
    <footer-component></footer-component>
    <!--フッター -->

@endsection
