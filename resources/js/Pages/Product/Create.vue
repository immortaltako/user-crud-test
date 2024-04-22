<script setup>
import ProductForm from '../Product/Components/ProductForm.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    page: String
});
</script>

<template>
    <AppLayout title="Create Product">
        <ProductForm :page="props.page" mode="create" />
    </AppLayout>
</template>
