<template>
    <form @submit.prevent="update" action="">
        <div>
            <label>Beds</label>
            <input type="text" v-model.number="form.beds">
            <span v-if="form.errors.beds" class="warning">
                *{{ form.errors.beds }}
            </span>
        </div>
        <div>
            <label>Baths</label>
            <input type="text" v-model.number="form.baths">
            <span v-if="form.errors.baths" class="warning">
                *{{ form.errors.baths }}
            </span>
        </div>
        <div>
            <label>Area</label>
            <input type="text" v-model.number="form.area">
            <span v-if="form.errors.area" class="warning">
                *{{ form.errors.area }}
            </span>
        </div>
        <div>
            <label>City</label>
            <input type="text" v-model="form.city">
            <span v-if="form.errors.city" class="warning">
                *{{ form.errors.city }}
            </span>
        </div>
        <div>
            <label>Post Code</label>
            <input type="text" v-model="form.code">
            <span v-if="form.errors.city" class="warning">
                *{{ form.errors.city }}
            </span>
        </div>
        <div>
            <label>Street</label>
            <input type="text" v-model="form.street">
            <span v-if="form.errors.street" class="warning">
                *{{ form.errors.street }}
            </span>
        </div>
        <div>
            <label>Street NR</label>
            <input type="text" v-model.number="form.street_nr">
            <span v-if="form.errors.street_nr" class="warning">
                *{{ form.errors.street_nr }}
            </span>
        </div>
        <div>
            <label>Price</label>
            <input type="text" v-model.number="form.price">
            <span v-if="form.errors.price" class="warning">
                *{{ form.errors.price }}
            </span>
        </div>
        <div>
            <button type="submit">Edit</button>
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
