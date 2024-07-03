<template>
    <form @submit.prevent="create" action="">
        <div>
            <label>Beds</label>
            <input type="text" v-model.number="form.beds">
            <span v-if="form.errors.beds" class="warning">
                *{{form.errors.beds}}
            </span>
        </div>
        <div>
            <label>Baths</label>
            <input type="text" v-model.number="form.baths">
            <span v-if="form.errors.baths"class="warning">
                *{{form.errors.baths}}
            </span>
        </div>
        <div>
            <label>Area</label>
            <input type="text" v-model.number="form.area">
            <span v-if="form.errors.area"class="warning">
                *{{form.errors.area}}
            </span>
        </div>
        <div>
            <label>City</label>
            <input type="text" v-model="form.city">
            <span v-if="form.errors.city"class="warning">
                *{{form.errors.city}}
            </span>
        </div>
        <div>
            <label>Post Code</label>
            <input type="text" v-model="form.code">
            <span v-if="form.errors.city"class="warning">
                *{{form.errors.city}}
            </span>
        </div>
        <div>
            <label>Street</label>
            <input type="text" v-model="form.street">
            <span v-if="form.errors.street"class="warning">
                *{{form.errors.street}}
            </span>
        </div>
        <div>
            <label>Street NR</label>
            <input type="text" v-model.number="form.street_nr">
            <span v-if="form.errors.street_nr"class="warning">
                *{{form.errors.street_nr}}
            </span>
        </div>
        <div>
            <label>Price</label>
            <input type="text" v-model.number="form.price">
            <span v-if="form.errors.price"class="warning">
                *{{form.errors.price}}
            </span>
        </div>
        <div>
            <button type="submit">Create</button>
        </div>
    </form>
</template>

<script setup>
import {ref} from 'vue'
import {useForm} from '@inertiajs/vue3'

const form = useForm({
    beds: 0,
    baths: 0,
    area: 0,
    city: '',
    street: '',
    code: '',
    street_nr: 0,
    price: 0,
})

const create = () => form.post(route('listing.store'))
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}
.warning{
    color: red;
}
</style>
