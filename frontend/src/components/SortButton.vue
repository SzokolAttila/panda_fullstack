<template>
    <button @click="$emit('sort')" class="p-2 bg-green-800 rounded-md text-white hover:text-black border border-green-800 hover:bg-green-300">
        {{ title }}
    </button>
</template>

<script>
    export default {
        emits: ["sort"],
        props: {
            title: String
        }
    }
</script>