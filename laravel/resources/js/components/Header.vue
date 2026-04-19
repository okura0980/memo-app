<script setup lang="ts">
import DocumentSvg from './svgs/DocumentSvg.vue'
</script>

<template>
    <header class="w-full bg-white rounded-xl shadow-sm px-6 py-4">
        <div class="flex items-center justify-center gap-3">
            <DocumentSvg class="h-8 w-8 text-orange-500" />

            <div class="text-center">
                <h1 class="text-4xl font-bold text-orange-500">
                    かんたんメモ
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    思いついたことをサッと記録しよう
                </p>
            </div>
        </div>
    </header>
</template>
