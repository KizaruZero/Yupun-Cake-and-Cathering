<!-- ProdukSection.vue -->
<template>
    <section class="py-16 bg-gradient-to-b from-orange-50 to-white">
        <div class="container mx-auto bg-gradient-to-b from-orange-50">
            <!-- Decorative Elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div
                    class="absolute top-20 left-10 w-72 h-72 bg-orange-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"
                ></div>
                <div
                    class="absolute top-40 right-10 w-72 h-72 bg-yellow-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"
                ></div>
                <div
                    class="absolute -bottom-20 left-1/2 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"
                ></div>
            </div>
            <h2 class="text-3xl font-bold text-center mb-12">
                Produk Unggulan Kami
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <ProductCard
                    v-for="product in products"
                    :key="product.id"
                    :product="product"
                />
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from "vue";
import ProductCard from "../frontend-components/ProductCard.vue";
import axios from "axios";

const products = ref([]);

// Contoh data produk (bisa digantikan dengan data dari API)
const fetchProducts = async () => {
    try {
        const response = await axios.get("/api/products");
        products.value = response.data.data;
    } catch (error) {
        console.error("Error fetching products:", error);
    }
};

onMounted(() => {
    fetchProducts();
});
</script>
