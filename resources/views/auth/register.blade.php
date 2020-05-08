@extends('layouts.app')

@section('content')

    <!-- ヘッダ- コンポーネント化する -->
    <header-component
        logout="{{ route('logout') }}"
        authcheck="{{Auth::check()}}"
    ></header-component>
    <!-- ヘッダ- コンポーネント化する -->
    <main class="l-main l-main--base">
        <div class="l-main__inner">
            <div class="p-form__container">
                <h2 class="p-form__title">{{ __('Register') }}</h2>
                <div class="c-form__container">
                    <form method="POST" action="{{ route('register') }}" class="c-form c-form--contact">
                        @csrf
                        <!-- エラーメッセージ表示欄ここから -->
                            @error('name')
                            <p class="c-form__err" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                            @error('email')
                            <p class="c-form__err">
                                {{ $message }}
                            </p>
                            @enderror
                            @error('password')
                            <p class="c-form__err">
                                {{ $message }}
                            </p>
                            @enderror

                        <!-- エラーメッセージ表示欄ここまで -->
                        <label for="name" class="c-form__label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control
                            @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') }}" required autocomplete="name"
                               placeholder="Your Name" autofocus>



                        <label for="email" class="c-form__label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}"
                               required autocomplete="email"
                               placeholder="Your Email" autofocus>

                        <label for="password" class="c-form__label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="
                                        @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password"
                               placeholder="Password" >

                        <label for="password-confirm" class="c-form__label">{{ __('Confirm Password') }}</label>

                        <input id="password-confirm" type="password" class=""
                               name="password_confirmation" required autocomplete="new-password"
                               placeholder="Password(再確認)">


                        <div class="c-form__label--check">
                            <label for="remember">
                                <input type="checkbox" name="remember"
                                       class="c-form--check"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <div>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif

                            <button type="submit" class="c-btn p-login__btn">
                                {{ __('Register') }}
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
