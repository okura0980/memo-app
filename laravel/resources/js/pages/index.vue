<script setup lang="ts">
import Welcome from "../features/Welcome.vue";
import { ref,onMounted,computed } from 'vue'
import Header from "../components/Header.vue";
import Textarea from '../components/TextareaForm.vue';
import SaveButton from '../components/SaveButton.vue';
import Memoarea from '../components/Memoarea.vue';
import TagInput from '../components/TagInput.vue';
import TagFilter from '../components/TagFilter.vue';
const text = ref('')
const memos = ref([])
const tagText = ref('')
const showTags = ref(false)
const selectedTag = ref('')

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
            tags: tagText.value
                .split(',')
                .map(tag => tag.trim())
                .filter(tag => tag !== ''),
        }),
    })
    await fetchMemos()
    text.value = ''
    tagText.value = ''
}

const allTags = computed(() => {
    const tags = memos.value.flatMap((memo: any) => memo.tags)
    return [...new Map(tags.map((tag: any) => [tag.id, tag])).values()]
})

const filteredMemos = computed(() => {
    if (selectedTag.value === '') return memos.value

    return memos.value.filter((memo: any) =>
        memo.tags.some((tag: any) => tag.name === selectedTag.value)
    )
})

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
                <TagInput v-model="tagText"/>

        <!-- ボタン -->
        <SaveButton
        :disabled="text.trim().length===0"
        @click="saveMemo"
        />
        </div>

        <TagFilter
            :ch_showTags="showTags"
            :ch_allTags="allTags"
            :ch_selectedTag="selectedTag"
            @toggle="showTags = !showTags"
            @select="selectedTag = $event"
        />

        <Memoarea :memos="filteredMemos" @delete="deleteMemo"/>

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

.tag-input{
    width:400px;
    border:1px solid #a3a3a3;
    border-radius:8px;
}

.tag-box{

}

.tag-list{
    display:flex;
    flex-direction:column;

    width:200px;
    margin-top:10px;

    border:1px solid #d6d6d6;
    border-radius:8px;

    background:white;
    overflow:hidden;
}

.tag-item{
    padding:10px;
    text-align:left;

    border:none;
    border-bottom:1px solid #e5e5e5;

    background:white;
    cursor:pointer;
}

.tag-item:last-child{
    border-bottom:none;
}

.tag-item:hover{
    background:#fff3e0;
}
</style>
