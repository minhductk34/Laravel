<template>
    <div class="flex flex-col-reverse  md:grid md:grid-cols-12 gap-4">
        <Box class="col-span-12 md:col-span-8 flex items-center w-full">
            <div class="w-full text-center">No images</div>
        </Box>
        <div class="md:col-span-4 flex flex-col gap-4">
            <Box>
                <template #header>
                    Basic info
                </template>
                <Price :price="listing.price" class="text-2xl"></Price>
                <ListingSpace :listing="listing" class="text-lg"></ListingSpace>
                <ListingAdress :listing="listing" class="text-gray-400"></ListingAdress>
            </Box>
            <Box>
                <template #header>
                    Offer
                </template>
                Make an offer
            </Box>
        </div>

    </div>

</template>
<script setup>

import ListingAdress from "@/Components/ListingAdress.vue";
import Price from "@/Components/Price.vue";
import ListingSpace from "@/Components/UI/ListingSpace.vue";
import Box from "@/Components/UI/Box.vue";

defineProps({
    listing: Array
})
</script>
