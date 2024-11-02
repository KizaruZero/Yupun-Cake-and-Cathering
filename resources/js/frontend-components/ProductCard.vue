<template>
    <article
        class="flex flex-col justifyu-center items-center px-8 rounded-lg max-w-96 bg-gradient-to-b from-white to-orange-100 p-8 rounded-3xl"
    >
        <header class="flex flex-col self-stretch px-6 pt-7 pb-4 rounded-full">
            <img
                loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/f260debb414c5cbbf33266d0114373a3d32ac6a2ccd9ff06182522f6193ec23b?apiKey=566c88d13f564de8a79a5f1407a51555&"
                class="object-contain aspect-[0.96]"
                alt="Kebab dish"
            />
        </header>

        <h2
            class="mt-4 text-2xl font-semibold text-center text-red-500 capitalize"
        >
            {{ product.name }}
        </h2>
        <p
            class="mt-0 w-full text-base text-center capitalize opacity-80 text-zinc-900"
        >
            {{ product.description }}
        </p>
        <form @submit.prevent="submitCart" class="space-y-4 mt-4">
            <div class="flex items-center justify-center space-x-4">
                <label for="quantity" class="text-gray-700 font-medium"
                    >Qty:</label
                >
                <input
                    type="number"
                    v-model.number="quantity"
                    min="1"
                    class="w-20 bg-white/10 text-center border-0 rounded-3xl focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                    required
                />
            </div>
            <button
                type="submit"
                class="w-full px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white rounded-full font-medium transform transition-all duration-300 hover:scale-105 hover:shadow-lg flex items-center justify-center"
                :disabled="isLoading"
            >
                <span
                    v-if="isLoading"
                    class="spinner-border animate-spin mr-2"
                ></span>
                {{ isLoading ? "Menambahkan..." : "Add to Cart" }}
            </button>
        </form>
    </article>
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
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-top: 3px solid white;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
