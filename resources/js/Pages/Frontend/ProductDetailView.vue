<template>
    <section v-if="product" class="py-16 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">
                {{ product.name }}
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <img
                    :src="product.image"
                    alt="Product Image"
                    class="w-full h-auto"
                />
                <div>
                    <p>{{ product.description }}</p>
                    <!-- Other product details -->
                </div>
            </div>
        </div>
    </section>
    <section v-else class="py-16 bg-gray-100">
        <div class="container mx-auto">
            <p class="text-center">Loading...</p>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import axios from "axios";

// Accept 'id' as a prop
const props = defineProps({
    id: {
        type: [Number, String], // Accept both Number and String
        required: true,
    },
});

// Define reactive product object
const product = ref(null);

const productId = props.id;
const order = ref({
    payment_method: null,
    booking_date: null,
});

const minDate = computed(() => {
    const today = new Date();
    return today.toISOString().split("T")[0];
});

// Fetch product data from API when mounted
const fetchProduct = async () => {
    try {
        const response = await axios.get(`/api/product/${productId}`);
        product.value = response.data.data;
    } catch (error) {
        console.log(productId);
        console.error("Error fetching product:", error);
    }
};

onMounted(() => {
    fetchProduct();
});
</script>
