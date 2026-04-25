<script setup lang="ts">
import DocumentSvg from './svgs/DocumentSvg.vue'
import TrashSvg from './svgs/TrashSvg.vue'

defineProps<{
    memos: any[]
}>()

defineEmits(['delete'])
</script>

<template>
    <div class="memo-area">
        <div class="memo-header">
            <div class="memo-title">
                <span class="memo-icon"><DocumentSvg/></span>
                <span>保存されたメモ</span>
            </div>

            <span class="memo-count">{{ memos.length }}件</span>
        </div>

        <div v-if="memos.length===0" class="empty-area">
            <div class="empty-icon"><DocumentSvg/></div>
               <p class="empty-title">まだメモがありません</p>
                <p class="empty-text">上の入力欄空メモを作成してみましょう！</p>
        </div>

        <div
            v-else
            v-for="memo in memos"
            :key="memo.id"
            class="memo-card"
        >
            <div class="memo-content">
                {{ memo.content }}
            </div>

            <div class="memo-date">
                {{ memo.created_at }}
            </div>

            <button class="delete-btn" @click="$emit('delete', memo.id)">
                <TrashSvg />
            </button>
        </div>
        <div class="hint">Enterキーで素早く保存できます</div>
    </div>
</template>

<style>
.hint{
    text-align: center;
    font-size:13px;
    color:#bfbfbf;
    margin-top:100px;
}

.empty-area{
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    margin-top:80px;
}

.empty-icon{
    margin-bottom: 10px;
}

.empty-icon svg{
    width:40px;
    height:40px;
    color: #bfbfbf;
}

.empty-title{
    color: #5c5c5c;
    font-size:18px;
}

.empty-text{
    color:#bfbfbf;
    font-size:15px;
    margin-top:10px;
}

.memo-area {
    width: 500px;
    margin: 0 auto;
}

.memo-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 14px;
}

.memo-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: bold;
    color: #1f2937;
}

.memo-icon {
    color: orange;
}

.memo-count {
    background: #fdecc8;
    color: #6b7280;
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 14px;
}

.memo-card {
    background: white;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 14px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    position: relative;
}

.memo-content {
    color: #1f2937;
    margin-bottom: 14px;
}

.memo-date {
    color: #9ca3af;
    font-size: 13px;
}

.delete-btn {
    position: absolute;
    top: 20px;
    right: 20px;
    display: none;
    background: white;
    color: #bfbfbf;
    cursor: pointer;
}

.memo-card:hover .delete-btn {
    display: block;
}

</style>
