<script setup>
defineProps(['modelValue'])
defineEmits(['update:modelValue'])
</script>

<template>
    <input
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        class="tag-input"
        placeholder="タグを入力（例：学校, バイト, 重要）"
    />
</template>

<style>
.tag-input{
    width:400px;
    border:1px solid white;
    border-radius:8px;
    padding:8px;
}
</style>
