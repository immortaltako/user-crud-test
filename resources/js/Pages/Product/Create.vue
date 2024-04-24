<script setup>
// Importing the ProductForm component for creating new products and the AppLayout for consistent page structure.
import ProductForm from '../Product/Components/ProductForm.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

// Defining props that are passed to the component. In this case, only the current page number is passed as a string.
const props = defineProps({
    page: String
});

</script>

<template>
    <AppLayout title="Create Product">
        <!-- ProductForm component is integrated here for the creation of a product. It receives the current page number as a prop and is set to 'create' mode to define its functionality. -->
        <ProductForm :page="props.page" mode="create" />
    </AppLayout>
</template>
