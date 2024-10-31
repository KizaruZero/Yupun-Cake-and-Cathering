<template>
    <GuestLayout>
        <div
            class="bg-gradient-to-b from-orange-50 to-white relative overflow-hidden"
        >
            <HeroSection />
            <TestimonialSection />
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import ProductSection from "@/frontend-components/ProductSection.vue";
import { Link } from "@inertiajs/vue3";
import HeroSection from "@/frontend-components/HeroSection.vue";
import TestimonialSection from "@/frontend-components/TestimonialSection.vue";
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
