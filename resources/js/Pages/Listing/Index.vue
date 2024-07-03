<template>
    <div v-for="listing in listings" :key="listings.id">
        <div>
            <Link :href="route('listing.show', listing.id)">
                <ListingAdress :listing="listing"></ListingAdress>
            </Link>
        </div>
        <div>
            <Link :href="route('listing.edit', listing.id)">Edit
            </Link>
        </div>
        <div>
            <Link :href="route('listing.destroy', listing.id)" method="DELETE">DELETE
            </Link>
        </div>
    </div>

</template>
<script setup>
import {Link} from "@inertiajs/vue3";
import ListingAdress from "@/Components/ListingAdress.vue";

defineProps({
    listings: Array
})
</script>
