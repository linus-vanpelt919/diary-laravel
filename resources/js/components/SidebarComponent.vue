<template>
    <div class="p-flex__right-size">
        <section class="p-flex__2col--right">
            <!--サイドバー   -->

            <div class="p-sidebar">
                <h1 class="p-sidebar__title">メニュー</h1>
                <ul class="p-sidebar__list">
                    <li class="p-sidebar__list--item"><a :href="profEdit">プロフィール編集</a></li>
                    <li class="p-sidebar__list--item"><a :href="diary">日記作成</a></li>
                    <li class="p-sidebar__list--item"><a :href="diaryList">日記一覧</a></li>
                    <li class="p-sidebar__list--item"><a :href="mypage">マイページ</a></li>
                </ul>
            </div>
            <!-- 検索ボックス-->
            <div class="p-sidebar">
                <form method="get" :action="postUri" name="sort">
                    <input type="hidden" name="_token" :value="csrf"><!--csrfトークン-->
                    <div class="p-sidebar__search">
                        <label for="order-select">
                            <select class="p-sidebar__search--select" name="order" id="order-select">
                                <option class="p-sidebar__search--select-box" value="">順番を入れ替える</option>
                                <option class="p-sidebar__search--select-box" value="desc">新しい順</option>
                                <option class="p-sidebar__search--select-box" value="asc">古い順</option>
                            </select>
                        </label>
                    </div>
                    <!-- カテゴリー -->
                    <div class="p-sidebar__search">
                        <label for="category-select">
                            <select class="p-sidebar__search--select" name="category" id="category-select">
                                <option class="p-sidebar__search--select-box" value="">カテゴリー</option>
                                <option class="p-sidebar__search--select-box" v-for="(item,key) in categorys" :value="item.id">{{item.category_name}}</option>
                            </select>
                        </label>
                    </div>
                    <div class="p-sidebar__search-btn">
                        <button class="c-btn c-btn__article">検索する</button>
<!--                        <input type="button" class="c-btn c-btn__article" value="検索する">-->
                    </div>
                </form>
            </div>

            <!-- 検索ボックス-->
            <div class="p-sidebar"><!-- コメントもulにした方がリンクできていいかも -->
                <h1 class="p-sidebar__title">最新のコメント</h1>
                <section>
                    <p class="p-sidebar__title">こんにちは、すごい感動しました。来年はもっと
                        たくさん見れるように今からカレンダーに予定
                        を立ててみようと思います</p>
                    <p class="p-sidebar__name">茂木栄五郎より</p>
                </section>

                <section>
                    <p class="p-sidebar__title">こんにちは、すごい感動しました。来年はもっと
                        たくさん見れるように今からカレンダーに予定
                        を立ててみようと思います</p>
                    <p class="p-sidebar__name">茂木栄五郎より</p>
                </section>
                <section>
                    <p class="p-sidebar__title">こんにちは、すごい感動しました。来年はもっと
                        たくさん見れるように今からカレンダーに予定
                        を立ててみようと思います</p>
                    <p class="p-sidebar__name">茂木栄五郎より</p>
                </section>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "SidebarComponent",
        data:function () {
            return{//csrfトークン
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')

            }
        },
        props: {
            mypage: { type: String, required: true },
            diaryList: { type: String, required: true },
            postUri: { type: String, required: true },
            diary: { type: String, required: true },
            profEdit: { type: String, required: true },
            sort: { type: String, required: true },
            categorys:{type:[Array,Object],required:false},
        },
        mounted() {
            //console.log(this.mypage)
            //console.log(this.profEdit)
            //console.log('csrf',this.csrf);
            console.log('sort',this.sort);
            console.log('categorys',this.categorys);
        }
    }
</script>

<style scoped>

</style>
