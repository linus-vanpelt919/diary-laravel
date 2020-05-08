<template>
    <header class="l-header">
        <!-- モーダル時に隠れない部分を暗くする -->
        <div class="p-header__sp"
             v-bind:class="{'active' : isActive}"
             @click="toggleMenu"></div>
        <h2 class="p-header">Matching</h2>
        <!-- ブラウザ表示の時 true falseで変更-->
        <nav>
            <ul class="p-header__nav-menu" v-if="this.authcheck">
                <li><a href="" v-on:click="doLogout">ログアウト</a></li>
                <li class="u-header__margin">|</li>
                <li><a href="/webukatu/laravel_prac/matching/public/register">新規登録</a></li>
<!--                <li><a href="">マイページ</a></li>-->
<!--                <li><a href="">プロフィール編集</a></li>-->
            </ul>
            <ul class="p-header__nav-menu" v-else>
                <li><a href="/webukatu/laravel_prac/matching/public/login">ログイン</a></li>
                <li class="u-header__margin">|</li>
                <li><a href="/webukatu/laravel_prac/matching/public/register">新規登録</a></li>
<!--                <li class="u-header__margin">|</li>-->
<!--                <li><a v-on:click="doLogout">ログアウト</a></li>-->
            </ul>
        </nav>
        <!-- ブラウザ表示の時-->

        <!-- ハンバーガーメニュー -->
        <div class="p-header__sp-menu"
             v-bind:class="{'active' : isActive}"
             @click="toggleMenu">
            <span class="p-header__sp-menu--line"></span>
            <span class="p-header__sp-menu--line"></span>
            <span class="p-header__sp-menu--line"></span>
        </div>
        <!-- モーダル部分 true falseで変更-->
        <div class="p-header__sp-modal"
             v-bind:class="{'active' : isActive}"
             >
            <ul class="p-header__sp-modal--list">
                <li class="p-header__sp-modal--list-item"><a href="">マイページ</a></li>
                <li class="p-header__sp-modal--list-item"><a href="">ログイン</a></li>
                <li class="p-header__sp-modal--list-item"><a href="">ログアウト</a></li>
                <li class="p-header__sp-modal--list-item"><a href="">新規登録</a></li>
            </ul>
        </div>
        <!-- ハンバーガーメニュー -->
    </header>
</template>

<script>
    export default {
        name: "HeaderComponent",
        data:function(){
            return{
                //スマホアイコン
                isActive: false,
            }
        },
        props:{
            authcheck: Boolean,
            logout: String,
        },
        mounted(){
          console.log('logout',this.logout);
          console.log('auth',this.authcheck);
        },
        computed:{

        },
        methods:{
            //ハンバーガーアイコン
            toggleMenu: function () {
                this.isActive = !this.isActive
            },
            //ログアウト機能
            doLogout() {
                //axios使ってlogoutをpost送信
                axios.post(this.logout)
                    .then(function (response) {//ログアウトしたらログイン画面に飛ばす
                        window.location.href = '/webukatu/laravel_prac/matching/public/login';
                    })
                    .catch(function (error) {
                        if (error.response.status === 401 || error.response.status === 500) {
                            //認証エラーかシステムエラーの時
                            self.$toasted.global.my_error('エラー(' + error.response.status + '): ' + error.response.data.message);
                        } else {
                            console.log(error.response);
                            self.$toasted.global.my_error('エラーが発生しました');
                        }
                    });

            },

        }
    }
</script>
