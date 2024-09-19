<!-- ProductCard.vue -->
<template>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img
            :src="product.image"
            :alt="product.name"
            class="w-full h-48 object-cover"
        />
        <div class="p-4">
            <h3 class="text-xl font-semibold mb-2">{{ product.name }}</h3>
            <p class="text-gray-600 mb-4">{{ product.price }}</p>
            <Link
                :href="`/product/${product.id}`"
                class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg"
            >
                Lihat Detail
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    product: Object,
});
</script>
