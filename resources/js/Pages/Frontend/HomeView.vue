<template>
    <GuestLayout>
        <div
            class="bg-gradient-to-b from-orange-50 to-white relative overflow-hidden"
        >
            <HeroSection />
            <div class="px-44 mx-auto bg-white pb-8">
                <h2
                    class="text-5xl font-extrabold text-center mb-4 hover:animate-bounce"
                >
                    Today
                    <span class="text-yellow-500">Special</span>
                    Offers
                </h2>
                <div class="w-1/2 mx-auto">
                    <p class="text-xl text-center mb-12">
                        Inilah sajian istimewa yang menjadi favorit tim Yupun
                        Cake and Catering! Setiap hidangan dipilih dengan cermat
                        untuk menghadirkan pengalaman rasa yang paling berkesan.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 bg-">
                    <ProductCard
                        v-for="product in popularProduct"
                        :key="product.id"
                        :product="product"
                        class="hover:scale-105 transition-all delay-75"
                        data-aos="fade-up"
                    />
                </div>
            </div>
            <AboutUsSection />
            <div class="mt-4">
                <WhyUsSection />
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import ProductSection from "@/frontend-components/ProductSection.vue";
import ProductCard from "@/frontend-components/ProductCard.vue";
import { Link } from "@inertiajs/vue3";
import HeroSection from "@/frontend-components/HeroSection.vue";
import AboutUsSection from "@/frontend-components/AboutUsSection.vue";
import WhyUsSection from "@/frontend-components/WhyUsSection.vue";
import axios from "axios";

const popularProduct = ref([]);

const fetchPopularProduct = async () => {
    try {
        const response = await axios.get("/api/products/popular");
        popularProduct.value = response.data.data;
    } catch (error) {
        console.error("Error fetching popular products:", error);
    }
};

fetchPopularProduct();
</script>

<style>
@keyframes blob {
    0% {
        transform: translate(0px, 0px) scale(1);
    }
    33% {
        transform: translate(30px, -50px) scale(1.1);
    }
    66% {
        transform: translate(-20px, 20px) scale(0.9);
    }
    100% {
        transform: translate(0px, 0px) scale(1);
    }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

@keyframes float {
    0% {
        transform: translateY(0px) rotate(12deg);
    }
    50% {
        transform: translateY(-10px) rotate(12deg);
    }
    100% {
        transform: translateY(0px) rotate(12deg);
    }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animation-delay-1000 {
    animation-delay: 1s;
}
</style>
