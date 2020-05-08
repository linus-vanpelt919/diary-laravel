<template>
    <div class="body">
        <div v-for="(todo, index) in todoList" class="form">
            <div class="form-component">
                <div class="form-component_title">
                    日付
                </div>
                <div class="form-component_content">
                    <input type="date" v-model="todo.date">
                </div>
            </div>
            <div class="form-component">
                <div class="form-component_title">
                    時間
                </div>
                <div class="form-component_content">
                    <input type="time" v-model="todo.time">
                </div>
            </div>
            <div class="form-component">
                <div class="form-component_title">
                    タイトル
                </div>
                <div class="form-component_content">
                    <input type="text" v-model="todo.title">
                    {{ todo.title.length }} / 30
                </div>
            </div>
            <div class="form-component">
                <div class="form-component_title">
                    説明
                </div>
                <div class="form-component_content">
                    <textarea v-model="todo.description"></textarea>
                    {{ todo.description.length }} / 30
                </div>
            </div>
            <div class="commands">
                <button v-on:click.prevent="deleteForm(index)">削除</button>
            </div>
        </div>
        <div class="commands">
            <button v-on:click.prevent="addForm" v-if="isActive">追加</button>
        </div>
    </div>
</template>

<script>
    export default {
        //mixins: [TODO_LIST],
        name: "CreateFormComponent",
        data() {
            return {
                todoList: [], //todoリスト
                TODO_LIST:'',
                isActive: true
            }
        },
        created() {
            if(this.todoList.length > 3 ){//うまくいかない
                this.isActive = false
            }else{
                this.todoList = TODO_LIST;

            }
        },
        methods: {
            addForm() {
                const additionalForm = {
                    title: "",
                    description: "",
                    date: "",
                    time: "",
                }
                this.todoList.push(additionalForm);
            },
            deleteForm(id) {
                this.todoList.splice(id, 1);
            },
            checkForm(e){
                e.preventDefault();
                console.log('prevent!');
            }
        }
    }
</script>
