@extends('layouts.app')

@section('title','profEdit')

@section('content')

    <!-- ヘッダ- コンポーネント化する -->
    <header-component></header-component>
    <!-- ヘッダ- コンポーネント化する -->

    <main class="l-main l-main--base">
       <h2>フォーム生成</h2>
        <div class="l-main__inner">
            <div class="p-form__container">
                <h2 class="p-form__title">{{ __('createForm') }}</h2>
                <div class="c-form__container">
                    <form method="GET" action="{{ route('createForm') }}"
                          enctype="multipart/form-data"
                          @submit="checkForm"
                          class="c-form c-form--contact">
                        @csrf
                        <!-- ここから-->
                            <createform-component></createform-component>
                        <!-- ここから-->
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
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
