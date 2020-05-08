<?php
//ここにパンくずリストを記述していく
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});
//Home > diary
Breadcrumbs::for('diary', function ($trail) {
    $trail->parent('home');
    $trail->push('日記作成', url('diary'));
});
//Home > profEdit
Breadcrumbs::for('profEdit', function ($trail) {
    $trail->parent('home');
    $trail->push('プロフィール編集', url('profEdit'));
});

//Home > mypage
Breadcrumbs::for('mypage', function ($trail) {
    $trail->parent('home');
    $trail->push('マイページ', url('mypage'));
});
