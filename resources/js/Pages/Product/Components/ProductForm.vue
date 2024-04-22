<script setup>
// Imports necessary Vue functions, Inertia for requests, and other required components.
import { ref, watchEffect, defineProps } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import NavLink from "@/Components/NavLink.vue";
import { route } from '../../../../../vendor/tightenco/ziggy';

// Defines the props expected by the component, including product data, page, and mode.
const props = defineProps({
    product: Object,
    page: String,
    mode: String // 'create' or 'edit'
});

// A reactive reference to determine if the form is in 'edit' mode.
const isEditMode = ref(props.mode === 'edit');

// Reactive references for form fields.
const productName = ref('');
const productSku = ref('');
const productPrice = ref(0);
const productUnitsSold = ref(0);

// The current page number for pagination.
const currentPage = ref(props.page);

// Effect to reactively update form fields whenever the product prop changes.
watchEffect(() => {
    if (props.product?.data) {
        productName.value = props.product.data.name;
        productSku.value = props.product.data.sku;
        productPrice.value = props.product.data.price;
        productUnitsSold.value = props.product.data.units_sold;
    }
});

// Function to submit the product data to the server.
const submitProduct = () => {
    // Collects the product data from form fields.
    const productData = {
        name: productName.value,
        sku: productSku.value,
        price: parseFloat(productPrice.value),
        units_sold: parseInt(productUnitsSold.value),
        page: currentPage.value
    };

    // Determines the HTTP method and route based on the mode.
    const method = isEditMode.value ? 'put' : 'post';
    const routeName = isEditMode.value ? 'dashboard.products.update' : 'dashboard.products.store';
    // Includes the product ID in route parameters if in edit mode.
    const routeParams = isEditMode.value ? { product: props.product.data.id } : {};

    // Sends the request to the server with Inertia.
    Inertia[method](route(routeName, routeParams), productData, {
        preserveState: true, // Preserves the state to prevent the page from refreshing.
        onSuccess: () => { // Callback for a successful operation.
            console.log('Operation successful.');
        },
        onError: errors => { // Callback for handling errors.
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
                    <label for="name" class="block font-medium text-sm text-gray-700">Product Name:</label>
                    <input v-model="productName" type="text" id="name" class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm w-full p-2">

                    <label for="sku" class="block font-medium text-sm text-gray-700">SKU:</label>
                    <input v-model="productSku" type="text" id="sku" class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm w-full p-2">

                    <label for="price" class="block font-medium text-sm text-gray-700">Price:</label>
                    <input v-model="productPrice" type="number" id="price" class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm w-full p-2">

                    <label for="units_sold" class="block font-medium text-sm text-gray-700">Units Sold:</label>
                    <input v-model="productUnitsSold" type="number" id="units_sold" class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm w-full p-2">

                    <div class="flex justify-between mt-6">
                        <NavLink :href="route('dashboard.products.index', { page: currentPage })" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back</NavLink>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ isEditMode ? 'Update Product' : 'Add Product' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
