<template>
    <div class="p-form__inside"
         @dragover.prevent="changeStyle($event,'ok')"
         @dragleave.prevent="changeStyle($event,'no')"
         @drop.prevent="uploadFile($event)">
        <label for="pic" class="c-form__label-pic">
            <!--ファイル上限 いらないかも-->
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
            <input id="pic" type="file" accept="image/*"
                   name="pic"
                   class="p-form__pic @error('pic') is-invalid @enderror"
                   @change="uploadFile($event)">
            <div class="p-form--size">
                <div class="p-form__pic--type">
                    <p class="p-form--choice">画像を選択</p>
                    <p class="p-form--choice">or</p>
                    <p class="p-form--choice">ドラッグ&ドロップ</p>
                    <!-- ここからプレビュー機能の部分 -->
<!--                    <div v-if="diary.pic !== undefined || null ">-->
                    <div v-if="preview">
                        <img class="img-prev" v-show="preview" v-bind:src="preview" alt="プレビュー画像" >
                    </div>
                    <div v-else-if="diary.pic !== undefined "><!-- これだと新規の時にからなので画像ないよアイコンが写ってしまう-->
                        <img class="img-prev" v-bind:src="getImg(diary.pic)" alt="登録画像">
                    </div>
                    <div v-else>
                        <img class="img-prev" v-show="preview" v-bind:src="preview" alt="プレビュー登録" >
                    </div>
                    <!-- ここまでプレビュー機能の部分 -->
                    <!-- ここからプレビュー機能の部分 -->
<!--                    <img class="p-form__pic-prev" v-show="preview" v-bind:src="preview" >-->
                    <!-- ここまでプレビュー機能の部分 -->
<!--                    <img class="p-form__pic-prev" v-bind:src="imageData" v-if="imageData">-->
                    <!--プレビューデータがなかったらDBのデータを表示したい -->
                </div>
            </div>
        </label>
    </div>
</template>

<script>
    export default {
        name: "ImgPrevComponent",
        props:{
            diary:{
                type: [Object,String],
                required: false, //必須かどうか
                default:''//デフォルトを設定してあげれば変数がなくても問題ない
            },
            'old':{
                type:[Object,Array],
                required: false, //必須かどうか
                default:''
            }


        },
        data:function () {
            return{
                preview:'',
                name:'',
            }
        },
        mounted(){
            //console.log('diary',this.diary);
            //console.log('old',this.old);

        },
        methods: {
            uploadFile: function (event) {
                console.log('upファイル',event);
                const files = event.target.files ? event.target.files : event.dataTransfer.files;
                const file = files[0];
                const reader = new FileReader();
                reader.onload = event => {
                    this.preview = event.target.result;
                };
                reader.readAsDataURL(file);//画像の読み込み
                this.name = files[0].name;
                document.getElementById("upload_image").files = files;
            },
            getImg(pic){//登録画像URL変換
                return "../storage/uploads/"+pic
            },
        }
    }
</script>

<style scoped>

</style>
