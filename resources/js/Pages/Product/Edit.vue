<script setup>
// Importing the ProductForm component for editing products and the AppLayout for consistent page structure.
import ProductForm from '../Product/Components/ProductForm.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

// Defining props passed to the component, including the product object and the current page number as a string.
const props = defineProps({
    product: Object,
    page: String
});

</script>

<template>
    <AppLayout title="Edit Product">
        <!-- ProductForm component is used here to allow editing of a product. It receives the product object and the current page number as props. 'mode' prop is set to 'edit' to specify the form's function. -->
        <ProductForm :product="props.product" :page="props.page" mode="edit" />
    </AppLayout>
</template>
