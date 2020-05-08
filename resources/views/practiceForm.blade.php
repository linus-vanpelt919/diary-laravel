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
        <h1 class="p-form__title--menu">vue練習</h1>
        <div class="l-main__inner">
            <div class="l-flex">
                <div class="p-flex p-flex__space">
                    <div class="p-flex__left-size">
                        <section class="p-flex__2col--left">
                            <!--記事一覧-->
{{--                            <div class="p-article">--}}
                                <practiceform-component
                                    v-bind:diarys="{{$diarys}}"
                                    ></practiceform-component>
{{--                                @foreach($diarys as $diary)--}}
{{--                                    <section class="p-article__entry">--}}
{{--                                        <div class="p-article__entry--head">--}}
{{--                                            <img src="{{asset('img/cafe.jpeg')}}" alt="">--}}
{{--                                        </div>--}}
{{--                                        <div class="p-article__entry--body">--}}
{{--                                            <p class="p-article__entry--day">{{$diary->created_at->format('Y-m-d')}}</p>--}}
{{--                                            <p class="p-article__entry--title">{{Str::limit($diary->title,20)}}</p>--}}
{{--                                            <p class="p-article__entry--description"><!--「あ」で２文字換算空白も -->--}}
{{--                                                {{Str::limit($diary->detail,20)}}--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                        <div class="p-article__entry--foot">--}}
{{--                                            <a href="" class="p-article__entry--read c-btn__article">読む</a>--}}
{{--                                            <a href="{{route('diaryEdit',$diary->id)}}" class="p-article__entry--edit c-btn__article">編集する</a>--}}
{{--                                            <form method="post" action="{{route('diary_delete',$diary->id)}}">--}}
{{--                                            @csrf<!-- post送信のためformタグで囲う -->--}}
{{--                                                <button class="p-article__entry--delete c-btn__article" onclick="return confirm('削除しますか?');">削除する</button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </section>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
                        </section>
                    </div>




                    <!-- サイドバー -->
                    <sidebar-component
                        mypage="{{route('mypage')}}"
                        diary-list="{{route('diaryList')}}"
                        diary="{{route('diary')}}"
                        prof-edit="{{route('profEdit',Auth::user()->id)}}"
                    ></sidebar-component>
                    <!-- サイドバー -->
                </div>
            </div>
        </div>
    </main>

    <!--フッター -->
    <footer-component></footer-component>
    <!--フッター -->
@endsection
