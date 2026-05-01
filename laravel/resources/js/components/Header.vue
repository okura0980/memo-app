<script setup lang="ts">
import DocumentSvg from './svgs/DocumentSvg.vue'
</script>

<template>
    <header class="header">

        <!-- 上（アイコン + タイトル） -->
        <div class="top">
            <DocumentSvg class="icon" />
            <h1 class="title">かんたんメモ</h1>
        </div>

        <!-- 下（説明） -->
        <p class="subtitle">
            思いついたことをサッと記録しよう
        </p>

    </header>
</template>

<style scoped>
.header {
    width: 100%;
    padding: 24px 0;
    background: white;
    text-align: center;
    box-shadow: 0 2px 16px rgba(0,0,0,0.1);
    margin-bottom: 2px;
}

/* 上の行 */
.top {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

/* アイコン */
.icon {
    width: 28px;
    height: 28px;
    color: #f97316; /* オレンジ */
}

/* タイトル */
.title {
    font-size: 30px;
    font-weight: 500;
    color: #f97316;
}

/* サブタイトル */
.subtitle {
    margin-top: 8px;
    font-size: 14px;
    color: #6b7280;
}
</style>
