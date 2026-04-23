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
        <div class="in"> <PlusSvg class="icon" />
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
    background: linear-gradient(90deg, #f3b489, #e8a6a6);
    opacity: 0.6;
    cursor: not-allowed; }

.button.active {
    background: #f59e0b;
    background: linear-gradient(90deg, #ff6a00, #ef4444);
    cursor: pointer; }

.button.active:hover {
    background: #ea8a00;
}

.icon{
    width: 20px;
    height: 20px;
    color: white;
}
</style>
