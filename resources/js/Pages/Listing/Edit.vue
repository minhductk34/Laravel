<template>
    <form @submit.prevent="update" action="">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label class="label">Beds</label>
                <input type="text" v-model.number="form.beds" class="input">
                <span v-if="form.errors.beds" class="warning">
                *{{ form.errors.beds }}
            </span>
            </div>
            <div class="col-span-2">
                <label class="label">Baths</label>
                <input type="text" v-model.number="form.baths" class="input">
                <span v-if="form.errors.baths" class="warning">
                *{{ form.errors.baths }}
            </span>
            </div>
            <div class="col-span-2">
                <label class="label">Area</label>
                <input type="text" v-model.number="form.area" class="input">
                <span v-if="form.errors.area" class="warning">
                *{{ form.errors.area }}
            </span>
            </div>
            <div class="col-span-4">
                <label class="label">City</label>
                <input type="text" v-model="form.city" class="input">
                <span v-if="form.errors.city" class="warning">
                *{{ form.errors.city }}
            </span>
            </div>
            <div class="col-span-2">
                <label class="label">Post Code</label>
                <input type="text" v-model="form.code" class="input">
                <span v-if="form.errors.city" class="warning">
                *{{ form.errors.city }}
            </span>
            </div>
            <div class="col-span-4">
                <label class="label">Street</label>
                <input type="text" v-model="form.street" class="input">
                <span v-if="form.errors.street" class="warning">
                *{{ form.errors.street }}
            </span>
            </div>
            <div class="col-span-2">
                <label class="label">Street NR</label>
                <input type="text" v-model.number="form.street_nr" class="input">
                <span v-if="form.errors.street_nr" class="warning">
                *{{ form.errors.street_nr }}
            </span>
            </div>
            <div class="col-span-6">
                <label class="label">Price</label>
                <input type="text" v-model.number="form.price" class="input">
                <span v-if="form.errors.price" class="warning">
                *{{ form.errors.price }}
            </span>
            </div>
            <div class="col-span-6">
                <button type="submit" class="btn-primary">Edit</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import {ref} from 'vue'
import {useForm} from '@inertiajs/vue3'

const props = defineProps({
    listing: Object
})
const form = useForm({
    beds: props.listing.beds,
    baths: props.listing.baths,
    area: props.listing.area,
    city: props.listing.city,
    street: props.listing.street,
    code: props.listing.code,
    street_nr: props.listing.street_nr,
    price: props.listing.price,
})

const update = () => form.put(route('listing.update', props.listing.id))
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}

.warning {
    color: red;
}
</style>
