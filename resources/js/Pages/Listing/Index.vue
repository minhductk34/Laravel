<template>
    <Fillters :filters="filters"></Fillters>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Box v-for="listing in listings.data" :key="listing.id">
            <div>
                <Link :href="route('listing.show', listing.id)">
                    <Price :price="listing.price" class="text-2xl"></Price>
                    <ListingSpace :listing="listing" class="text-lg"></ListingSpace>
                    <ListingAdress :listing="listing" class="text-gray-400"></ListingAdress>
                </Link>
            </div>
            <div>
                <Link :href="route('listing.edit', listing.id)">Edit</Link>
            </div>
            <div>
                <Link :href="route('listing.destroy', listing.id)" method="delete" as="button">DELETE</Link>
            </div>
        </Box>
    </div>
    <div v-if="listings.data.length" class="w-full flex justify-center mt-8 mb08">
        <Pagination :links="listings.links"></Pagination>
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3';
import ListingAdress from '@/Components/ListingAdress.vue';
import Box from '@/Components/UI/Box.vue';
import ListingSpace from '@/Components/UI/ListingSpace.vue';
import Price from '@/Components/Price.vue';
import Pagination from '@/Components/UI/Pagination.vue';
import Fillters from "@/Pages/Index/Components/Fillters.vue";

defineProps({
    listings: Object,
    filters: Object,
})
</script>
