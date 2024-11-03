<template>
    <div
        class="bg-gradient-to-b from-orange-50 to-white relative overflow-hidden"
    >
        <div
            class="absolute inset-10 overflow-hidden"
            style="pointer-events: none"
        >
            <div
                class="absolute top-20 left-10 w-72 h-72 bg-orange-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"
                style="pointer-events: none"
            ></div>
            <div
                class="absolute top-40 right-10 w-72 h-72 bg-yellow-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"
                style="pointer-events: none"
            ></div>
            <div
                class="absolute bottom-10 left-1/2 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"
                style="pointer-events: none"
            ></div>
        </div>
        <div class="px-44 bg-white">
            <div class="flex space-x-10 justify-center bg-b">
                <!-- Left Section -->

                <!-- Right Section -->
                <div class="w-1/2 px-20 py-12" data-aos="zoom-in-up">
                    <h1
                        class="text-2xl font-bold tracking-wider text-orange-500"
                    ></h1>
                    <div class="pt-4 text-5xl font-bold">
                        Dapur Sederhana, Rasa Istimewa
                    </div>
                    <p class="text-base pt-4">
                        Dari dapur kami yang sederhana, kami meracik setiap
                        hidangan secara handmade, memberikan perhatian pada
                        setiap bahan yang dipilih hingga rasa terbaik tersaji di
                        meja Anda
                    </p>
                    <!-- Navigation Arrows -->
                    <!-- Features -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 pt-8">
                        <div class="flex items-center space-x-2">
                            <div
                                class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-orange-500"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-medium text-gray-900">24/7</p>
                                <p class="text-sm text-gray-500">Service</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-orange-500"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-medium text-gray-900">Quality</p>
                                <p class="text-sm text-gray-500">Assured</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-orange-500"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"
                                    />
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-medium text-gray-900">
                                    Best Price
                                </p>
                                <p class="text-sm text-gray-500">Guaranteed</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-1/2 flex justify-center" data-aos="fade-right">
                    <img
                        src="@/assets/autentik.png"
                        alt=""
                        class="rounded-2xl w-3/4 transform transition-transform duration-700 hover:scale-105"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import { onMounted } from "vue";
import AOS from "aos";

// onMounted(() => {
//     AOS.init();
// });
</script>

<style scoped>
.group:hover .group-hover\:scale-110 {
    transform: scale(1.1);
}
</style>
