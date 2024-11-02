<template>
    <GuestLayout>
        <div
            class="bg-gradient-to-b from-orange-50 to-white relative overflow-hidden"
        >
            <HeroMenuSection />
            <div class="bg-white">
                <CakeSection />
                <div class="cake-section mx-auto bg-white">
                    <h2
                        class="text-4xl font-extrabold text-center mb-4 hover:animate-bounce"
                    >
                        <span class="text-orange-500">Cake</span> That
                        <span class="text-yellow-500">Always</span> Make You
                        Fall In
                        <span class="text-red-500">Love</span>
                    </h2>
                    <ProductCategorySection category="1" />
                </div>
                <div class="mt-6">
                    <CateringSection />
                </div>
                <div class="cake-section mx-auto bg-white pt-8">
                    <h2
                        class="text-4xl font-extrabold text-center mb-8 hover:animate-bounce"
                    >
                        <span class="text-orange-500">Catering</span> That
                        <span class="text-yellow-500">Always</span> Make You
                        Fall In
                        <span class="text-red-500">Love</span>
                    </h2>
                    <ProductCategorySection category="2" />
                </div>
                <div class="mt-6">
                    <SnackSection />
                </div>
                <div class="cake-section mx-auto bg-white pt-8">
                    <h2
                        class="text-4xl font-extrabold text-center mb-8 hover:animate-bounce"
                    >
                        <span class="text-orange-500">Snack</span> That
                        <span class="text-yellow-500">Always</span> Make You
                        Fall In
                        <span class="text-red-500">Love</span>
                    </h2>
                    <ProductCategorySection category="3" />
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import ProductCategorySection from "@/frontend-components/ProductCategorySection.vue";
import { Link } from "@inertiajs/vue3";
import HeroMenuSection from "@/frontend-components/HeroMenuSection.vue";
import CakeSection from "@/frontend-components/CakeSection.vue";
import CateringSection from "@/frontend-components/CateringSection.vue";
import SnackSection from "@/frontend-components/SnackSection.vue";
const isHovered = ref(false);
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
