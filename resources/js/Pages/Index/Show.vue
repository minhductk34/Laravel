<template>
    <div>Show</div>
    <Link href="/">Index Page</Link>
    <div>The page with time: {{ timer }}</div>
</template>
<script setup>
import {Link} from "@inertiajs/vue3";
import {ref} from "vue";

const timer = ref(0)
setInterval(() => {
    timer.value++
}, 1000)
</script>

