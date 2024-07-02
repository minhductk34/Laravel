<template>
    <Link href="/">MainPage</Link>&nbsp;
    <Link href="/show">ShowPage</Link>
    <slot></slot>
</template>
<script setup>
import {Link} from "@inertiajs/vue3";
</script>
