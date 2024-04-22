<script setup>
import ProductForm from '../Product/Components/ProductForm.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    product: Object,
    page: String
});
</script>

<template>
    <AppLayout title="Edit Product">
        <ProductForm :product="props.product" :page="props.page" mode="edit" />
    </AppLayout>
</template>
