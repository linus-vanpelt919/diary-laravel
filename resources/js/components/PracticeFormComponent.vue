<template >
    <div class="p-article">
        <section class="p-article__entry" v-for="(item,key) in diarys" :value="key">
                <div class="p-article__entry--head">
                    <!--画像の有無-->
                    <img v-if="item.pic" v-bind:src="getImg(item.pic)" alt=""><!--storage/uploads/を追加したい -->
                    <img v-else src="img/cafe.jpeg" alt="">
                </div>
                <div class="p-article__entry--body">
                    <p class="p-article__entry--day">{{item.created_at.substr(0,10)}}</p>
                    <p class="p-article__entry--title">{{item.title.substr(0,10)}}</p>
                    <p class="p-article__entry--description"><!--「あ」で２文字換算空白も -->
                        {{item.detail.substr(0,10)}}
                    </p>
                </div>
                <div class="p-article__entry--foot">
                    <a href="" class="p-article__entry--read c-btn__article">読む</a>
                    <a href="" class="p-article__entry--edit c-btn__article">編集する</a>
                    <form method="post" action="">
                        <!--                @csrf&lt;!&ndash; post送信のためformタグで囲う &ndash;&gt;-->
                        <button class="p-article__entry--delete c-btn__article" onclick="return confirm('削除しますか?');">削除する</button>
                    </form>
                </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "PracticeFormComponent",

    props:{
      diarys:{
          type: Array,
          required: true
      },

    },
    mounted(){
      console.log(this.diarys)
    },
    data:function(){
        return{

            }
        },

    computed: {

        },
    methods:{
        getImg(pic){
            return "storage/uploads/"+ pic
        }
    }


}
</script>

<!--{{diarys[5]['created_at']}}などのようにすると表示できる-->
<!--        <div v-for="(item,key) in diarys" :value="key">-->
<!--            <p>{{item.title}}</p>-->
<!--            <p>{{item.detail}}</p>-->
<!--        </div>-->
