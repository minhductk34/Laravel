<template>


    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-700 w-full">
        <div class="container max-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg">
                    <Link :href="route('listing.index')">Listings</Link>&nbsp;

                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
                    <Link :href="route('listing.index')">X-Project</Link>&nbsp;
                </div>
                <div v-if="user" class="flex items-center gap-4">
                    <div class="bg-indigo-600 hover:bg-indigo-500 text-white font-medium p-2 rounded-md">
                        <Link :href="route('listing.create')">+ New Listing</Link>
                    </div>
                    <div class="text-sm text-gray-500">{{ user.name }}</div>
                    <div>
                        <Link :href="route('logout')" method="delete" as="button">Logout</Link>
                    </div>
                </div>
                <div v-else class="flex items-center gap-2">
                    <Link :href="route('login')" class="btn-primary">SignIn</Link>
                    <Link :href="route('user-account.create')" class="btn-primary">Register</Link>

                </div>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4 w-full">
        <div v-if=" flashSuccess"
             class="mb-4 border rounded-md shadow-sm border-green-200 bg-green-150 dark:border-green-800  dark:bg-green:900 dark:text-indigo-300 p-2">
            {{ flashSuccess }}
        </div>
        <slot></slot>
    </main>

</template>
<script setup>
import {computed} from "vue"
import {Link, usePage} from "@inertiajs/vue3";

const flashSuccess = computed(() => page.props.flash.success)
const user = computed(() => page.props.user)
const page = usePage()
</script>


