@extends('layouts.app')

@section('title','profEdit')

@section('content')

    <!-- ヘッダ- コンポーネント化する -->
    <header-component
        v-bind:logout="'{{ route('logout') }}'"
        v-bind:authcheck="@auth true @endauth @guest false @endguest"
    ></header-component>
    <!-- ヘッダ- コンポーネント化する -->
    <main class="l-main l-main--base">
        <!-- パンくずリスト-->
        {{ Breadcrumbs::render('profEdit') }}
        <!-- パンくずリスト-->
        <div class="l-main__inner">
            <div class="p-form__container">
                <h2 class="p-form__title">{{ __('ProfEdit') }}</h2>
                <div class="c-form__container">
                    <form method="POST" action="{{ route('profUpdate',$user->id) }}" enctype="multipart/form-data"
                          class="c-form c-form--contact">
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
                            @error('tell')
                            <p class="c-form__err">
                                {{ $message }}
                            </p>
                        @enderror

                        <!-- エラーメッセージ表示欄ここまで -->
                        <div id="upload" class="l-form-group "
                             @dragover.prevent="changeStyle($event,'ok')" @dragleave.prevent="changeStyle($event,'no')"
                             @drop.prevent="uploadFile($event)">
                            <label for="name" class="c-form__label">{{ __('name') }}</label>
                            <input id="name" type="text" class="
                                            @error('name') is-invalid @enderror" name="name"
                                   value="{{$user->name}}"
                                    autocomplete="current-name">

                            <label for="email" class="c-form__label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ $user->email }}"
                                   autocomplete="email" autofocus>

                            <label for="tell" class="c-form__label">{{ __('tell') }}</label>
                            <input id="tell"
                                   type="text" class="
                                     @error('tell') is-invalid @enderror"
                                   name="tell"
                                   value="{{ $user->tell }}"
                                   autocomplete="current-tell">


                            <!--画像アップロード-->
                            <profedit-component v-bind:user="{{json_encode($user)}}"></profedit-component>

                            <div class="p-login">
                                <button type="submit" class="c-btn p-login__btn">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                            <!--画像の表示-->
                        {{--<img src="{{asset('storage/uploads/'.$user->img)}}" alt="">--}}
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
