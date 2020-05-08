<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token axios用 vue.jsで使う-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Home') | matching</title>
{{--タイトルを設定できる--}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{--ここにgoogleフォント、フォントオーサムを設定できる--}}
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


<!-- OGP設定 start -->
{{--    あとで--}}
{{--    OGPとはOpen Graph Protcolの略称で、FacebookやTwitter、
        mixiなどのSNSでシェアされた際に、そのページのタイトル
        ・URL・概要・アイキャッチ画像（サムネイル）を意図した通りに
        正しく表示させる仕組みです。--}}

    <!-- OGP設定 end -->
</head>
<body>
{{--フッターを固定するためにflexbox使うパターンもある--}}
{{--jqueryもある appを設定することでVue.jsが使える--}}
    <div id="app" class="wrapper--main" v-cloak>
            {{--content--}}
            @yield('content')
            {{--content--}}
    </div>

<!-- フラッシュメッセージ -->
<!-- 成功 -->
@if (session('suc_msg'))
    <div class="p-message p-message__suc"
         v-bind:class="{'is-msg': isMsg}" role="alert">
        {{ session('suc_msg') }}
    </div>
@endif
<!-- 失敗 -->
@if (session('err_msg'))
    <div class="p-message p-message__err"
         v-bind:class="{'is-msg': isMsg}" role="alert">
        {{ session('err_msg') }}
    </div>
@endif
<!-- フラッシュメッセージ -->


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
