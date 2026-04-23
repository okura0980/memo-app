<script setup lang="ts">
import Welcome from "../features/Welcome.vue";
import { ref } from 'vue'
import Header from "../components/Header.vue";
import Textarea from '../components/TextareaForm.vue';
import SaveButton from '../components/SaveButton.vue';
const text = ref('')
const saveMemo = () => {
    if (text.value.trim().length === 0) return

    console.log(text.value)
    text.value = ''
}
</script>

<template>
  <Header />
    <div class="card">

        <!-- タイトル -->
        <div class="clickbox">
            <span class="plus">＋</span>
            <span class="message">新しいメモ</span>
        </div>

        <!-- テキストエリア -->
        <Textarea v-model="text" />

        <!-- ボタン -->
        <SaveButton
        :disabled="text.trim().length===0"
        @click="saveMemo"
        />
    </div>
</template>

<style>
.clickbox{
    margin-bottom:10px;
}

.plus{
    color: orange;
    margin-right:7px;
}

.message{
    font-weight: bold;
}

.card {
    width: 500px;
    margin: 40px auto;
    padding: 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
</style>
