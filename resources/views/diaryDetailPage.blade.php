@extends('layouts.app')

@section('title','prof')

@section('content')

    <!-- ヘッダ- コンポーネント化する -->
    <header-component></header-component>
    <!-- ヘッダ- コンポーネント化する -->

    <main class="l-main l-main--base">
        <h1 class="p-form__title--menu">日記一覧詳細</h1>
        <div class="l-main__inner">
            <div class="l-flex">
                <div class="p-flex p-flex__space">
                    <div class="p-flex__left-size">
                        <section class="p-flex__2col--left">
                            <!--記事-->
                            <div class="p-article">
                                <section class="p-article__detail">
                                    <h1 class="p-article__detail-title">記事タイトル</h1>
                                    <p class="p-article__detail-meta">
                                        <span class="p-article--post">作成 {{$diary->created_at}}</span>
                                        <span class="p-article--post">更新 {{$diary->updated_at}}</span>
                                        <span class="p-article--post">カテゴリー {{$category->category_name}}</span>
                                    </p>
                                    <div class="p-article__detail-img">
                                        @if($diary->pic)
                                        <img class="p-article-img" src="{{asset('storage/uploads/'.$diary->pic)}}" alt="登録画像">
                                        @else
                                            <img class="p-article-img" src="{{asset('images/sample-img.png')}}" alt="デフォルト画像">
                                        @endif
                                    </div>
                                    <div class="p-article__detail-text">
                                        <p class="p-article-text">
                                            {{$diary->detail}}
                                        </p>
                                    </div>
                                </section>



                            <!-- 記事-->
                            </div>
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
