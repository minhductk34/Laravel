<template>
    <form @submit.prevent="filter">
        <div class="mb-8 mt-4 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center">
                <input
                    v-model="filterForm.priceFrom"
                    class="input-filter-l w-28"
                    type="text"
                    placeholder="Price from"></input>
                <input
                    v-model="filterForm.priceTo"
                    class="input-filter-r w-28"
                    type="text"
                    placeholder="Price to"></input>
            </div>
            <div class="flex flex-nowrap items-center">
                <select class="input-filter-l w-25" v-model="filterForm.beds">
                    <option :value="null">Beds</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option value="6">6+</option>
                </select>
                <select class="input-filter-r w-25" v-model="filterForm.baths">
                    <option :value="null">Baths</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option value="6">6+</option>
                </select>
            </div>
            <div class="flex flex-nowrap items-center">
                <input
                    v-model="filterForm.areaFrom"
                    class="input-filter-l w-28"
                    type="text"
                    placeholder="Area from"></input>
                <input
                    v-model="filterForm.areaTo"
                    class="input-filter-r w-28"
                    type="text"
                    placeholder="Area to"></input>
            </div>
            <div class="flex flex-nowrap items-center gap-4">
                <button type="submit" class="btn-normal">Filter</button>
                <button type="reset" @click="clear">Clear</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import {useForm} from '@inertiajs/vue3';

const props = defineProps({
    filters: Object,

});

const filterForm = useForm({
    priceFrom: null,
    priceTo: null,
    beds: null,
    baths: null,
    areaFrom: null,
    areaTo: null
});

const filter = () => {
    filterForm.get(
        route('listing.index'),
        {
            preserveState: true,
            preserveScroll: true
        }
    );
}

const clear = () => {
    filterForm.priceFrom = props.filters.priceFrom || null;
    filterForm.priceTo = props.filters.priceTo || null;
    filterForm.beds = props.filters.beds || null;
    filterForm.baths = props.filters.baths || null;
    filterForm.areaFrom = props.filters.areaFrom || null;
    filterForm.areaTo = props.filters.areaTo || null;
    filter();
}
</script>

