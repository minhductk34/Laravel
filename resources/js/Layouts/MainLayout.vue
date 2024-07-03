<template>
    <Link href="/listing">Listings</Link>&nbsp;
    <Link href="/listing/create">New Listing</Link>
    <div v-if="flashSuccess" class="success">
        {{ flashSuccess }}
    </div>
    <slot></slot>
</template>
<script setup>
import {computed} from "vue"
import {Link, usePage} from "@inertiajs/vue3";

const flashSuccess = computed(() => page.props.flash.success)
const page = usePage()
</script>
<style scoped>
.success {
    background: green;
    color: white;
}
</style>

