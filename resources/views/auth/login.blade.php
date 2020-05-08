@extends('layouts.app')

@section('title','Login')

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
                <h2 class="p-form__title">{{ __('Login') }}</h2>
                <div class="c-form__container">
                    <form method="POST" action="{{ route('login') }}" class="c-form c-form--contact">
                        @csrf

                        <!-- エラーメッセージ表示欄ここから -->
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
                        <label for="email" class="c-form__label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}"
                                   required autocomplete="email" autofocus
                                   placeholder="Eメールアドレス">


                        <label for="password" class="c-form__label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="
                                        @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password"
                               placeholder="パスワード">


                        <div class="c-form__label--check">
                                <input type="checkbox" name="remember"
                                       class="c-form--check"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="c-form--label">
                                <span class="p-form--msg">{{ __('Remember Me') }}</span>
                            </label>
                        </div>


                            @if (Route::has('password.request'))
                                <div class="p-form__reminder">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    <span class="p-form--msg">{{ __('Forgot Your Password?') }}</span>
                                </a>
                                </div>
                            @endif
                            <div class="p-form__btn">
                                <button type="submit" class="c-btn p-login__btn">
                                    {{ __('Login') }}
                                </button>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </main>

    <!--フッター -->
    <footer-component></footer-component>
    <!--フッター -->

@endsection
