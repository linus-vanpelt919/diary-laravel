@extends('layouts.app')

@section('title','diary')

@section('content')

    <!-- ヘッダ- コンポーネント化する -->
    <header-component
        v-bind:logout="'{{ route('logout') }}'"
        v-bind:authcheck="@auth true @endauth @guest false @endguest"
    ></header-component>
    <!-- ヘッダ- コンポーネント化する -->

    <main class="l-main l-main--base">
        <h1 class="p-form__title--menu">日記編集画面</h1>
        <div class="l-main__inner">
            <div class="p-form__container">
                <h2 class="p-form__title">{{ __('diary') }}</h2>
                <div class="c-form__container">
                    <form method="POST" action="{{ route('diary_edit',$diary->id) }}" enctype="multipart/form-data"
                          class="c-form c-form--contact">
                    @csrf
                    <!-- エラーメッセージ表示欄ここから -->
                        @error('title')
                        <p class="c-form__err" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                        @error('detail')
                        <p class="c-form__err">
                            {{ $message }}
                        </p>
                        @enderror
                        @error('category_id')
                        <p class="c-form__err">
                            {{ $message }}
                        </p>
                         @enderror
                    <!-- エラーメッセージ表示欄ここまで -->
                        <div id="upload" class="l-form-group "
                             @dragover.prevent="changeStyle($event,'ok')" @dragleave.prevent="changeStyle($event,'no')"
                             @drop.prevent="uploadFile($event)">
                            <label for="name" class="c-form__label">{{ __('title') }}</label>
                            <input id="name" type="text"
                                   class="@error('title') is-invalid @enderror"
                                   name="title"
                                   value="{{old('title',$diary->title)}}"
                                   autocomplete="current-name">
                            <!--カテゴリー -->
                            <label for="category_id" class="p-form__category"></label>
                            <select name="category_id"  class="p-form__category-select category-select
                                   @error('category_id') is-invalid @enderror">
                                <option class="p-form__category-name" value="">カテゴリー</option>
                                <!-- foreachで展開-->
                                @foreach($categorys as $category)
                                    <option class="p-form__category-name" value="{{$category->id}}"
                                            @if ($diary->category_id == $category->id)
                                            selected
                                            @endif>
                                        {{$category->category_name}}</option>
                                @endforeach
                            <!-- foreachで展開-->
                            </select>
                        <!--カテゴリー-->
                            <label for="detail" class="c-form__label">{{ __('detail') }}</label>
                            <textarea name="detail"  cols="30" rows="10"
                                      class="form-control
                                    @error('detail') is-invalid @enderror">{{old('detail',$diary->detail)}}
                            </textarea>
                            <!-- 写真 -->
                            <imgprev-component
                                v-bind:diary="{{$diary}}">
                            </imgprev-component>
                            <!--写真 -->

                            <div class="p-login">
                                <button type="submit" class="c-btn p-login__btn">
                                    {{ __('Update') }}
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
