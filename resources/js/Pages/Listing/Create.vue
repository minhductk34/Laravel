<template>
    <form @submit.prevent="create" action="">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Beds</label>
                <input type="text" v-model.number="form.beds"
                       class="block w-full p-3 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500">
                <span v-if="form.errors.beds" class="warning">
                *{{ form.errors.beds }}
            </span>
            </div>
            <div class="col-span-2">
                <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Baths</label>
                <input type="text" v-model.number="form.baths"
                       class="block w-full p-3 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500">
                <span v-if="form.errors.baths" class="warning">
                *{{ form.errors.baths }}
            </span>
            </div>
            <div class="col-span-2">
                <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Area</label>
                <input type="text" v-model.number="form.area"
                       class="block w-full p-3 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500">
                <span v-if="form.errors.area" class="warning">
                *{{ form.errors.area }}
            </span>
            </div>
            <div class="col-span-4">
                <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">City</label>
                <input type="text" v-model="form.city"
                       class="block w-full p-3 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500">
                <span v-if="form.errors.city" class="warning">
                *{{ form.errors.city }}
            </span>
            </div>
            <div class="col-span-2">
                <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Post Code</label>
                <input type="text" v-model="form.code"
                       class="block w-full p-3 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500">
                <span v-if="form.errors.city" class="warning">
                *{{ form.errors.city }}
            </span>
            </div>
            <div class="col-span-4">
                <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Street</label>
                <input type="text" v-model="form.street"
                       class="block w-full p-3 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500">
                <span v-if="form.errors.street" class="warning">
                *{{ form.errors.street }}
            </span>
            </div>
            <div class="col-span-2">
                <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Street NR</label>
                <input type="text" v-model.number="form.street_nr"
                       class="block w-full p-3 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500">
                <span v-if="form.errors.street_nr" class="warning">
                *{{ form.errors.street_nr }}
            </span>
            </div>
            <div class="col-span-6">
                <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Price</label>
                <input type="text" v-model.number="form.price"
                       class="block w-full p-3 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500">
                <span v-if="form.errors.price" class="warning">
                *{{ form.errors.price }}
            </span>
            </div>
            <div class="col-span-6">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white font-medium p-2 rounded-md">
                    Create
                </button>
            </div>
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
