@extends('layouts.app')

@section('content')
    <!-- ヘッダ- コンポーネント化する -->
    <header-component
        logout="{{ route('logout') }}"
        authcheck="{{Auth::check()}}"
        ></header-component>
    <!-- ヘッダ- コンポーネント化する -->

    <!-- パンくずリスト-->
    <span class="">{{ Breadcrumbs::render('home') }}</span>
    <!-- パンくずリスト-->


    <div class="l-flex">
            <section class="p-flex__3col--left">
                <h1>サイドバー</h1>
                <ul>
                    <li><a href="{{route('profEdit',Auth::user()->id)}}">プロフィール編集</a></li>
                    <li><a href="{{route('diary')}}">日記作成</a></li>
                    <li><a href="{{route('diaryList')}}">日記一覧</a></li>
                    <li><a href="{{route('mypage')}}">マイページ</a></li>
                </ul>
            </section>
            <article class="p-flex__3col--middle">
                <h1>メインコンテンツ</h1>
                <p>And he went back to meet the fox...</p>
            </article>
            <section class="p-flex__3col--right">
                <h1>新着情報</h1>
                <p>The Little Prince (French: Le Petit Prince),...</p>
            </section>
    </div>

    <!--フッター -->
    <footer-component></footer-component>
    <!--フッター -->

@endsection
