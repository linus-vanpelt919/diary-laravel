@extends('layouts.app')

@section('title','prof')

@section('content')

    <!-- ヘッダ- コンポーネント化する -->
    <header-component
        v-bind:logout="'{{ route('logout') }}'"
        v-bind:authcheck="@auth true @endauth @guest false @endguest"
    ></header-component>    <!-- ヘッダ- コンポーネント化する -->

    <main class="l-main l-main--base">
        <h1>画像アップロード練習</h1>
        <div class="l-main__inner">
            <div class="p-form__container">
                <h2 class="p-form__title">{{ __('Prof') }}</h2>
                <div class="c-form__container">
                    <form method="POST" action="{{ route('prof') }}" enctype="multipart/form-data"
                          class="c-form c-form--contact">
                        @csrf
                        <div id="upload" class="l-form-group ">
                            <label for="name" class="c-form__label">{{ __('name') }}</label>
                            <input id="name" type="text" class="
                                            @error('name') is-invalid @enderror" name="name"
                                    autocomplete="current-name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror

                            <label for="email" class="c-form__label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}"
                                   autocomplete="email" autofocus>
                            @error('email')
                            <span class="" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                            <label for="tell" class="c-form__label">{{ __('tell') }}</label>
                            <input id="tell" type="text" class="
                                            @error('tell') is-invalid @enderror" name="tell"
                                   autocomplete="current-tell">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                            <!--画像アップロード-->
                            <prof-component></prof-component>

                            <div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
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
