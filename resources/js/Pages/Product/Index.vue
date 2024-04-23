<script setup>
// Importing necessary Vue and Inertia components.
import { computed, ref, defineProps } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/vue3';

// Defining the props received from the parent component.
const { products, isAdmin } = defineProps({
    products: Object,
    isAdmin: Boolean,
});

// Reactive property for the search query input.
const searchQuery = ref('');

// Checks if the products list is empty
const isProductsEmpty = computed(() => {
    return products.data.length === 0;
});

// Function to navigate to the product creation page.
// Uses Inertia.js to navigate while preserving the current pagination.
const navigateToAddProduct = () => {
    Inertia.get(route('dashboard.products.create', { page: products.current_page }));
};

// Function to search products based on the search query.
// Performs a redirect with a search parameter to filter products.
// Redirects without parameters to clear the filter if the search query is empty.
const searchProducts = () => {
    const query = searchQuery.value.trim();
    if (query !== '') {
        Inertia.get(route('dashboard.products.index', { search: query }));
    } else {
        Inertia.get(route('dashboard.products.index'));
    }
};

// Clears the search query and reloads the product listing without filters.
const resetSearch = () => {
    searchQuery.value = '';
    Inertia.get(route('dashboard.products.index'));
};

// Function to navigate to the product editing page.
const updateProduct = (id, page) => {
    Inertia.visit(route('dashboard.products.edit', {id}), {
        data: {page},
        preserveState: true
    });
};

// Function to delete a product after confirming the action.
const deleteProduct = (id) => {
    if (confirm('Are you sure you want to delete this product?')) {
        Inertia.delete(route('dashboard.products.destroy', {id}), {
            preserveScroll: true,
            preserveState: true
        });
    }
};

// Function to calculate the product number based on the current page and index.
const productNumber = (index) => {
    return (products.current_page - 1) * products.per_page + index + 1;
};

</script>

<template>
    <AppLayout title="Products">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Product Listing</h2>
        </template>
        <!-- Main content area for product management -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Container for product list and actions -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <!-- Button to add a new product, shown only to admin users -->
                    <div class="mb-6" v-if="isAdmin">
                        <button @click="navigateToAddProduct" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Product</button>
                    </div>

                    <!-- Search input and button for filtering products -->
                    <div class="flex items-center mb-4">
                        <input v-model="searchQuery" type="text" placeholder="Search by name" class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm w-full p-2 mr-4">
                        <button @click="searchProducts" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
                    </div>

                    <!-- Displays product details in a table if products exist -->
                    <div v-if="!isProductsEmpty">
                        <table class="w-full table-auto">
                            <thead>
                            <tr class="text-left">
                                <th class="px-4 py-2">Product Number</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">SKU</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Units Sold</th>
                                <th class="px-4 py-2">Category</th>
                                <th class="px-4 py-2" v-if="isAdmin">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="border-b" v-for="(product, index) in products.data" :key="product.id">
                                <td class="px-4 py-2">{{ productNumber(index) }}</td>
                                <td class="px-4 py-2">{{ product.name }}</td>
                                <td class="px-4 py-2">{{ product.sku }}</td>
                                <td class="px-4 py-2">${{ product.price }}</td>
                                <td class="px-4 py-2">{{ product.units_sold }}</td>
                                <td class="px-4 py-2">{{ product.category.name }}</td>
                                <td class="px-4 py-2" v-if="isAdmin">
                                    <div class="flex justify-start space-x-4">
                                        <button @click="updateProduct(product.id, products.current_page)" class="text-blue-500 hover:text-blue-700 mr-2">
                                            <font-awesome-icon :icon="['fas', 'edit']" />
                                        </button>
                                        <button @click="deleteProduct(product.id, products.current_page)" class="text-red-500 hover:text-red-700">
                                            <font-awesome-icon :icon="['fas', 'trash']" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Message displayed when no products are found after a search or if the product list is initially empty -->
                    <div v-else class="text-center py-8">
                        <p class="text-gray-700 text-xl">No results found.</p>
                        <button @click="resetSearch" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Back to All Results
                        </button>
                    </div>
                    <!-- Pagination links to navigate between pages of products -->
                    <div class="mt-4 flex justify-center space-x-1">
                        <template v-for="(link, index) in products.links">
                            <Link :href="link.url" :key="index" v-if="link.url" :class="['text-white font-bold py-2 px-4 rounded', link.active ? 'bg-blue-500' : 'bg-gray-500 hover:bg-gray-700']" v-html="link.label" />
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

