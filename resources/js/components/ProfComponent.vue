<template>
    <div class="content">
        <h1>File Upload</h1>
        <p><input type="file" ref="file" accept="image/*" @change="onFileChange($event)"></p>
        <img :src="imageData" v-if="imageData" alt="" style="width:300px; min-height: 100px; ">
        <button class="btn btn-danger" v-if="imageData" @click="resetFile()">リセット</button>
        <!--        <button v-on:click="fileUpload">アップロード</button>-->
        <!--色々実験 -->


        <!--色々実験 -->
    </div>
</template>

<script>
    export default {
        name: "ProfComponent",
        data() {
            return {
                imageData: ''//選択された画像データ
            }
        },
        props:{

        },
        methods: {
            onFileChange(e) {

                const files = e.target.files;
                if(files.length > 0) {//ファイルが選択されているか
                    const file = files[0];
                    const reader = new FileReader();//画像読み込み
                    reader.onload = (e) => {
                            //データをimageDataに格納
                        this.imageData = e.target.result;

                    };
                    reader.readAsDataURL(file);

                }
            },
            resetFile() {
                const input = this.$refs.file;
                input.type = 'text';
                input.type = 'file';
                this.imageData = '';
            }
        }
    }
</script>
