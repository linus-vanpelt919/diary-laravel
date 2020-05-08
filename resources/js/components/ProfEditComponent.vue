<template>
    <div id="upload" class="form-group commonStyle"
         @dragover.prevent="changeStyle($event,'ok')"
         @dragleave.prevent="changeStyle($event,'no')"
         @drop.prevent="uploadFile($event)">

        <label for="upload_image" class="button">
            <div class="test2">
                <p class="img-text">画像を選択(クリック)</p>
                <p class="img-text">or</p>
                <p class="img-text">ドラッグ＆ドロップ</p>
                <!-- ここからプレビュー機能の部分 -->
                <div v-if="preview === '' ">
                    <img class="img-prev"  v-bind:src="getImg(user.img)" alt="登録画像">
                </div>
                <div v-else>
                    <img class="img-prev" v-show="preview" v-bind:src="preview" alt="プレビュー画像">
                </div>
                <!-- ここまでプレビュー機能の部分 -->
            </div>
            <input id="upload_image" type="file" name="img"
                   @change="uploadFile($event)" style="display:none;"
                   accept="image/*">
        </label>


    </div>
</template>

<script>
    export default {
        name: "ProfEditComponent",
        data:function() {
            return{
                preview:'',
                name:'',

            }
        },
        props:{
            user:{
                type:Object,
                required: true
            }
        },
        mounted(){
            //console.log(this.user)
            //console.log('id',this.user.id)

        },
        computed:{

        },
        methods: {//画像ライブプレビュー
            uploadFile: function (event) {
                console.log('upファイル',event);
                const files = event.target.files ? event.target.files : event.dataTransfer.files;
                const file = files[0];
                const reader = new FileReader();
                reader.onload = event => { //IE??
                    this.preview = event.target.result;
                };
                reader.readAsDataURL(file);
                this.name = files[0].name;
                document.getElementById("upload_image").files = files;
            },
            getImg(pic){//登録画像URL変換
                return "../storage/uploads/"+pic
            }

        }
    }
</script>
