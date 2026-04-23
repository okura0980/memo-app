<script setup> import PlusSvg from './svgs/PlusSvg.vue'
defineProps({ disabled: Boolean })
const emit = defineEmits(['click'])
</script>
<template>
    <button :disabled="disabled"
            class="button"
            :class="disabled ? 'disabled' : 'active'"
            @click="emit('click')"
    >
        <div class="in"> <PlusSvg />
            <span>メモを保存</span>
        </div>
    </button>
</template>
<style scoped>
.button {
    width: 100%;
    margin-top: 16px;
    padding: 12px;
    border-radius: 8px;
    border: none; color: white;
    font-size: 16px; }

.in {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px; }

.button.disabled {
    background: rgba(223, 141, 81, 0.6);
    opacity: 0.6;
    cursor: not-allowed; }

.button.active {
    background: #f59e0b;
    cursor: pointer; }

.button.active:hover {
    background: #ea8a00;
}
</style>
