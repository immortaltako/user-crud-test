<script setup>
// Imports necessary for component functionality including Vue's reactive core and Inertia's routing.
import { ref, watchEffect, defineProps, onMounted } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import NavLink from "@/Components/NavLink.vue";
import { route } from '../../../../../vendor/tightenco/ziggy';

// Props definition, including product details and operational mode ('create' or 'edit').
const props = defineProps({
    product: Object,
    page: String,
    mode: String // Indicates whether the form is in 'create' or 'edit' mode.
});

// Reactive state indicating if the component is in 'edit' mode.
const isEditMode = ref(props.mode === 'edit');

// Reactive references for form inputs, initialized as empty or default values.
const productName = ref('');
const productSku = ref('');
const productPrice = ref(0);
const productUnitsSold = ref(0);

// Reactive reference for the current pagination page.
const currentPage = ref(props.page);

// Watch effect to update form fields whenever the 'product' prop changes (example ..... when editing).
watchEffect(() => {
    if (props.product?.data) {
        productName.value = props.product.data.name;
        productSku.value = props.product.data.sku;
        productPrice.value = props.product.data.price;
        productUnitsSold.value = props.product.data.units_sold;
    }
});

// Submits product data to the server using the appropriate HTTP method based on the form mode.
const submitProduct = () => {

    // Preprocess the price to remove '$' and other non-numeric characters except decimal point
    const sanitizedPrice = productPrice.value.replace(/[^\d.]/g, '');

    const productData = {
        name: productName.value,
        sku: productSku.value,
        price: parseFloat(sanitizedPrice),
        units_sold: parseInt(productUnitsSold.value),
        page: currentPage.value
    };

    // Determines whether to create a new product or update an existing one.
    const method = isEditMode.value ? 'put' : 'post';
    const routeName = isEditMode.value ? 'dashboard.products.update' : 'dashboard.products.store';
    const routeParams = isEditMode.value ? { product: props.product.data.id } : {};

    // Sends the request to the server with Inertia.
    Inertia[method](route(routeName, routeParams), productData, {
        preserveState: true,
        onSuccess: () => {
            console.log('Operation successful.');
        },
        onError: errors => {
            console.error('Operation failed.', errors);
        }
    });
};
</script>

<template>
    <div class="mt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form @submit.prevent="submitProduct" class="space-y-4">
                    <!-- Product name input field. -->
                    <label for="name" class="block font-medium text-sm text-gray-700">Product Name:</label>
                    <input v-model="productName" type="text" id="name" required class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm w-full p-2">

                    <!-- SKU input field. -->
                    <label for="sku" class="block font-medium text-sm text-gray-700">SKU:</label>
                    <input v-model="productSku" type="text" id="sku" required class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm w-full p-2">

                    <!-- Price input field. -->
                    <label for="price" class="block font-medium text-sm text-gray-700">Price:</label>
                    <input v-model="productPrice" type="text" id="price" required class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm w-full p-2">

                    <!-- Units sold input field. -->
                    <label for="units_sold" class="block font-medium text-sm text-gray-700">Units Sold:</label>
                    <input v-model="productUnitsSold" type="number" id="units_sold" required class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm w-full p-2">

                    <!-- Action buttons for form submission or navigation back to the product list, rendered based on the mode. -->
                    <div class="flex justify-between mt-6">
                        <NavLink :href="route('dashboard.products.index', { page: currentPage })" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back</NavLink>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ isEditMode ? 'Update Product' : 'Add Product' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
