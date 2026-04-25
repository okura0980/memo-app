<script setup lang="ts">
import Welcome from "../features/Welcome.vue";
import { ref,onMounted } from 'vue'
import Header from "../components/Header.vue";
import Textarea from '../components/TextareaForm.vue';
import SaveButton from '../components/SaveButton.vue';
import Memoarea from '../components/Memoarea.vue';
const text = ref('')
const memos = ref([])

const fetchMemos = async () => {
    const res = await fetch('/api/memos')
    memos.value = await res.json()
}

const deleteMemo = async (id: number) => {
    await fetch(`/api/memos/${id}`, {
        method: 'DELETE',
    })

    await fetchMemos()
}

const saveMemo = async () => {
    if (text.value.trim() === '') return

    await fetch('/api/memos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify({
            content: text.value,
        }),
    })
    await fetchMemos()
    text.value = ''
}

onMounted(() => {
    fetchMemos()
})
</script>

<template>
  <Header />
    <div class="aaa">
            <div class="card">

        <!-- タイトル -->
        <div class="clickbox">
            <span class="plus">＋</span>
            <span class="message">新しいメモ</span>
        </div>

        <!-- テキストエリア -->
        <Textarea
            v-model="text"
            @enter="saveMemo"
        />

        <!-- ボタン -->
        <SaveButton
        :disabled="text.trim().length===0"
        @click="saveMemo"
        />
        </div>

        <Memoarea :memos="memos" @delete="deleteMemo"/>

    </div>
</template>

<style>
.aaa{
    background-color:#fff8e8;
    padding-top: 40px;
    min-height: 100vh;
}

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
    margin: 0 auto;
    padding: 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
</style>
