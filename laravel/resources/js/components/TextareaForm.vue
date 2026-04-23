<script setup>
defineProps(['modelValue'])
defineEmits(['update:modelValue'])
</script>

<template>
  <textarea
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      class="textarea"
      placeholder="メモを入力してください...
Enter保存、Shift+Enterで改行"

  />
</template>

<style>
.textarea{
    width: 100%;
    height: 120px;
    border:1px solid #a3a3a3;
    border-radius:8px;
    padding:12px;
}

</style>
