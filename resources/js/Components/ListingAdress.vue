<template>
  <span>
    {{ listing.street }}
    {{ listing.street_nr }},
    {{ listing.city }} for
    <span c>{{ listing.price }}</span>
  </span>
</template>
<script setup>
defineProps({
    listing: Array
})
</script>
