@extends('layouts.app')

@section('title','diary')

@section('content')

    <!-- ヘッダ- コンポーネント化する -->
    <header-component></header-component>
    <!-- ヘッダ- コンポーネント化する -->

    <main class="l-main l-main--base">
        <h1 class="p-form__title--menu">日記一覧ページ</h1>
        <div class="l-main__inner">
            <div class="l-flex">
                <div class="p-flex p-flex__space">
                    <div class="p-flex__left-size">
                        <section class="p-flex__2col--left">
                            <!--記事一覧-->
                            <div class="p-article">
                                <!-- 日記一覧-->
                                @foreach($diarys as $diary)
                                    <section class="p-article__entry">
                                        <div class="p-article__entry--head">
                                            @if($diary->pic)
                                                <img src="{{asset('storage/uploads/'.$diary->pic)}}" alt="登録画像">
                                            @else
                                                <img src="{{asset('images/sample-img.png')}}" alt="未登録画像">
                                            @endif
                                        </div>
                                        <div class="p-article__entry--body">
                                            <p class="p-article__entry--day">{{$diary->created_at->format('Y-m-d')}}</p>
                                            <a href="{{route('diaryList',['category'=>$diary->category_id])}}"
                                               class="p-article__entry--link">{{$diary->category->category_name}}</a>
                                            <p class="p-article__entry--title">{{Str::limit($diary->title,20)}}</p>
                                            <p class="p-article__entry--description"><!--「あ」で２文字換算空白も -->
                                                {{Str::limit($diary->detail,20)}}
                                            </p>
                                        </div>
                                        <div class="p-article__entry--foot">
                                            <a href="{{route('diary_detail_page',$diary->id)}}" class="p-article__entry--read c-btn__article">読む</a>
                                            <!-- 日記作成者以外非表示にする-->
                                            @if(Auth::user()->id === $diary->user_id)
                                            <a href="{{route('diaryEdit',$diary->id)}}" class="p-article__entry--edit c-btn__article">編集する</a>
                                            <form method="post" action="{{route('diary_delete',$diary->id)}}">
                                            @csrf<!-- post送信のためformタグで囲う -->
                                                <button class="p-article__entry--delete c-btn__article" onclick="return confirm('削除しますか?');">削除する</button>
                                            </form>
                                            @endif
                                            <!-- 日記作成者以外非表示にする-->
                                        </div>
                                    </section>
                                @endforeach
                                <!-- 日記一覧-->
                            </div>
                        </section>
                        <!--ページネーション 外側はc-で共通化してもいいかも-->
                        <div class="p-paginate">
                            {{$diarys->links()}}
                        </div>
                        <!--ページネーション -->
                    </div>
                    <!-- サイドバー 検索先をpost-uriで分けてあげる-->
                    <sidebar-component
                        mypage="{{route('mypage')}}"
                        diary-list="{{route('diaryList')}}"
                        post-uri="{{route('diaryList')}}"
                        diary="{{route('diary')}}"
                        prof-edit="{{route('profEdit',Auth::user()->id)}}"
                        sort="{{route('diaryList')}}"
                        v-bind:categorys="{{json_encode($categorys)}}"
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
