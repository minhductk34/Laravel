<template>
    <div v-for="list in listings" :key="listings.id">
        <Link :href="`/listing/${list.id}`">
            {{ list.street }} , {{ list.street_nr }} , {{ list.city }},for ${{ list.price }}
        </Link>
    </div>
</template>
<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    listings: Array
})
</script>
