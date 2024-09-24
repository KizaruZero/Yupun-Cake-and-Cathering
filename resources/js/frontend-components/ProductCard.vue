<template>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <!-- Image Section -->
        <img
            :src="`/storage/${product.image}`"
            :alt="product.name"
            class="w-full h-48 object-cover"
        />

        <!-- Product Info Section -->
        <div class="p-4">
            <h3 class="text-xl font-semibold mb-2">{{ product.name }}</h3>
            <p class="text-gray-600 mb-4">
                Rp {{ formatCurrency(product.price) }}
            </p>

            <!-- Link to Product Details -->
            <Link
                :href="`/product/${product.id}`"
                class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg"
            >
                Lihat Detail
            </Link>

            <!-- Add to Cart Form -->
            <form @submit.prevent="submitCart" class="mt-4">
                <div class="flex items-center">
                    <label for="quantity" class="mr-2 text-gray-700"
                        >Qty:</label
                    >
                    <input
                        type="number"
                        v-model.number="quantity"
                        min="1"
                        class="w-16 text-center border rounded ml-4"
                        required
                    />
                </div>
                <button
                    type="submit"
                    class="mt-4 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg"
                    :disabled="isLoading"
                >
                    <span
                        v-if="isLoading"
                        class="spinner-border animate-spin mr-2"
                    ></span>
                    {{
                        isLoading ? "Menambahkan..." : "Tambahkan ke Keranjang"
                    }}
                </button>
            </form>

            <!-- Success Message -->
            <p v-if="successMessage" class="mt-2 text-green-600">
                {{ successMessage }}
            </p>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import axios from "axios";

// Props for product data
const props = defineProps({
    product: Object,
});

// Local state
const quantity = ref(1);
const isLoading = ref(false);
const successMessage = ref("");

// Submit to cart function
const submitCart = async () => {
    try {
        isLoading.value = true;
        successMessage.value = "";

        await axios.post(`/api/cart/add/${props.product.id}`, {
            quantity: quantity.value,
        });

        successMessage.value = "Produk berhasil ditambahkan ke keranjang!";
        quantity.value = 1; // Reset quantity after success
    } catch (error) {
        console.error("Error adding product to cart:", error);
    } finally {
        isLoading.value = false;
    }
};

// Utility function to format price
const formatCurrency = (value) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(value);
};
</script>

<style scoped>
.spinner-border {
    border: 4px solid transparent;
    border-top: 4px solid white;
    border-radius: 50%;
    width: 16px;
    height: 16px;
}
</style>
