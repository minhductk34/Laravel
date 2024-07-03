<template>
    <div>
        <ListingAdress :listing="listing"></ListingAdress>
    </div>

</template>
<script setup>

import ListingAdress from "@/Components/ListingAdress.vue";

defineProps({
    listing: Array
})
</script>
