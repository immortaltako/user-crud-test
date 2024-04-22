<script setup>
import { InertiaLink } from '@inertiajs/inertia-vue3';
import {route} from '../../../vendor/tightenco/ziggy';
import NavLink from "@/Components/NavLink.vue";

const props = defineProps({
    user: Object,
});

</script>

<template>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <h1 class="mt-8 text-2xl font-medium text-gray-900">
            Welcome, {{ props.user.name }}!
        </h1>

        <p class="mt-6 mb-20 text-gray-500 leading-relaxed">
            Please access your related links below.
        </p>
        <NavLink additionalClass="mt-4 text-blue-600 hover:text-blue-800" :href="route('dashboard.products.index')" :active="route().current('products')">
            Products
        </NavLink>
    </div>
</template>
