<script setup>
defineProps([
    'ch_showTags',
    'ch_allTags',
    'ch_selectedTag'
])

defineEmits([
    'toggle',
    'select'
])
</script>

<template>
    <div class="tag-box">

        <button
            class="tag-button"
            @click="$emit('toggle')"
        >
            タグ {{ ch_showTags ? '▲' : '▼' }}
        </button>

        <div
            v-if="ch_showTags"
            class="tag-list"
        >
            <button
                class="tag-item"
                @click="$emit('select', '')"
            >
                すべて
            </button>

            <button
                v-for="tag in ch_allTags"
                :key="tag.id"
                class="tag-item"
                @click="$emit('select', tag.name)"
            >
                #{{ tag.name }}
            </button>
        </div>

    </div>
</template>

<style>
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
    background: white;
}

.tag-button:hover{
    width:60px;
    border: 1px solid black;
}
</style>
